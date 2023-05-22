import React, { useState, useEffect } from 'react';
  import {
    SafeAreaView,
    View,
    Text,
    Button,
    StyleSheet,
    PermissionsAndroid ,
    FlatList,
  } from 'react-native';
  import BleManager from 'react-native-ble-plx';
  import { PERMISSIONS, requestMultiple } from 'react-native-permissions';
  import DeviceInfo from 'react-native-device-info';
    
  const requestPermissions = async () => {
    if (Platform.OS === 'android') {
      const apiLevel = await DeviceInfo.getApiLevel();
      if (apiLevel < 31) {
        const granted = await PermissionsAndroid.request(
        PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION,
        {
          title: 'Location Permission',
          message: 'Bluetooth Low Energy requires Location',
          buttonNeutral: 'Ask Later',
          buttonNegative: 'Cancel',
          buttonPositive: 'OK',
        },
      );
      } else {
        const result = await requestMultiple([
          PERMISSIONS.ANDROID.BLUETOOTH_SCAN,
          PERMISSIONS.ANDROID.BLUETOOTH_CONNECT,
          PERMISSIONS.ANDROID.ACCESS_FINE_LOCATION,
        ]);
    
        const isGranted =
          result['android.permission.BLUETOOTH_CONNECT'] === PermissionsAndroid.RESULTS.GRANTED &&
          result['android.permission.BLUETOOTH_SCAN'] === PermissionsAndroid.RESULTS.GRANTED &&
          result['android.permission.ACCESS_FINE_LOCATION'] === PermissionsAndroid.RESULTS.GRANTED;
    }
    
  }
};
    
    const App = () => {
    const [devices, setDevices] = useState([]);
    const [scanning, setScanning] = useState(false);
    const [bleManager, setBleManager] = useState(null);
    
    function requestBluetoothPermissions(cb) {
    if (Platform.OS === 'android') {
    DeviceInfo.getApiLevel().then((apiLevel) => {
    if (apiLevel < 31) {
    PermissionsAndroid.request(
    PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION,
    {
    title: 'Location Permission',
    message: 'Bluetooth Low Energy requires Location',
    buttonNeutral: 'Ask Later',
    buttonNegative: 'Cancel',
    buttonPositive: 'OK',
    },
    ).then((granted) => {
    cb(granted === PermissionsAndroid.RESULTS.GRANTED);
    });
    } else {
    requestMultiple([
    PERMISSIONS.ANDROID.BLUETOOTH_SCAN,
    PERMISSIONS.ANDROID.BLUETOOTH_CONNECT,
    PERMISSIONS.ANDROID.ACCESS_FINE_LOCATION,
    ]).then((result) => {
    const isGranted =
    result['android.permission.BLUETOOTH_CONNECT'] === PermissionsAndroid.RESULTS.GRANTED &&
    result['android.permission.BLUETOOTH_SCAN'] === PermissionsAndroid.RESULTS.GRANTED &&
    result['android.permission.ACCESS_FINE_LOCATION'] === PermissionsAndroid.RESULTS.GRANTED;
    cb(isGranted);
    });
    }
    });
    } else {
    cb(true);
    }
    }
    
    useEffect(() => {
        if (!bleManager) {
        requestBluetoothPermissions((isGranted) => {
        if (isGranted) {
        const manager = new BleManager();
        setBleManager(manager);
        manager.startDeviceScan(  [serialUUIDs.serviceUUID],
          {scanMode: ScanMode.LowLatency}, (error, device) => {
        if (error) {
        console.log(error.message);
        return;
        }
    
        console.log(device.name);
        console.log(device.id);
    
        if (device.name) {
          setDevices((prevDevices) => [...prevDevices, device]);
        }
        });
        setScanning(true);
        }
        });
        }
    }, []);
    
    return (
    <SafeAreaView>
      <View>
          {scanning ? (
          <Button
          title="Stop Scanning"
          onPress={() => {
          bleManager.stopDeviceScan();
          setScanning(false);
          }}
          />
          ) : (
          <Button
          title="Start Scanning"
          onPress={() => {
          requestBluetoothPermissions((isGranted) => {
          if (isGranted) {
          setDevices([]);
          bleManager.startDeviceScan([serialUUIDs.serviceUUID],
            {scanMode: ScanMode.LowLatency},(error, device) => {
          if (error) {
          console.log(error.message);
          return;
          }
          console.log(device.name);
          console.log(device.id);
    
          if (device.name) {
            setDevices((prevDevices) => [...prevDevices, device]);
          }
          });
          setScanning(true);
          }
          });
          }}
          />
          )}
      </View>
        <FlatList
        data={devices}
        renderItem={({ item }) => (
        <Text>
        {item.name} ({item.id})
        </Text>
        )}
        keyExtractor={(item) => item.id}
        />
    </SafeAreaView>
    );
    };
    
    export default App;