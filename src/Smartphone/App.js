"use strict";
/**
 * Sample BLE React Native App
 */
var __assign = (this && this.__assign) || function () {
    __assign = Object.assign || function(t) {
        for (var s, i = 1, n = arguments.length; i < n; i++) {
            s = arguments[i];
            for (var p in s) if (Object.prototype.hasOwnProperty.call(s, p))
                t[p] = s[p];
        }
        return t;
    };
    return __assign.apply(this, arguments);
};
var __awaiter = (this && this.__awaiter) || function (thisArg, _arguments, P, generator) {
    function adopt(value) { return value instanceof P ? value : new P(function (resolve) { resolve(value); }); }
    return new (P || (P = Promise))(function (resolve, reject) {
        function fulfilled(value) { try { step(generator.next(value)); } catch (e) { reject(e); } }
        function rejected(value) { try { step(generator["throw"](value)); } catch (e) { reject(e); } }
        function step(result) { result.done ? resolve(result.value) : adopt(result.value).then(fulfilled, rejected); }
        step((generator = generator.apply(thisArg, _arguments || [])).next());
    });
};
var __generator = (this && this.__generator) || function (thisArg, body) {
    var _ = { label: 0, sent: function() { if (t[0] & 1) throw t[1]; return t[1]; }, trys: [], ops: [] }, f, y, t, g;
    return g = { next: verb(0), "throw": verb(1), "return": verb(2) }, typeof Symbol === "function" && (g[Symbol.iterator] = function() { return this; }), g;
    function verb(n) { return function (v) { return step([n, v]); }; }
    function step(op) {
        if (f) throw new TypeError("Generator is already executing.");
        while (g && (g = 0, op[0] && (_ = 0)), _) try {
            if (f = 1, y && (t = op[0] & 2 ? y["return"] : op[0] ? y["throw"] || ((t = y["return"]) && t.call(y), 0) : y.next) && !(t = t.call(y, op[1])).done) return t;
            if (y = 0, t) op = [op[0] & 2, t.value];
            switch (op[0]) {
                case 0: case 1: t = op; break;
                case 4: _.label++; return { value: op[1], done: false };
                case 5: _.label++; y = op[1]; op = [0]; continue;
                case 7: op = _.ops.pop(); _.trys.pop(); continue;
                default:
                    if (!(t = _.trys, t = t.length > 0 && t[t.length - 1]) && (op[0] === 6 || op[0] === 2)) { _ = 0; continue; }
                    if (op[0] === 3 && (!t || (op[1] > t[0] && op[1] < t[3]))) { _.label = op[1]; break; }
                    if (op[0] === 6 && _.label < t[1]) { _.label = t[1]; t = op; break; }
                    if (t && _.label < t[2]) { _.label = t[2]; _.ops.push(op); break; }
                    if (t[2]) _.ops.pop();
                    _.trys.pop(); continue;
            }
            op = body.call(thisArg, _);
        } catch (e) { op = [6, e]; y = 0; } finally { f = t = 0; }
        if (op[0] & 5) throw op[1]; return { value: op[0] ? op[1] : void 0, done: true };
    }
};
var __spreadArray = (this && this.__spreadArray) || function (to, from, pack) {
    if (pack || arguments.length === 2) for (var i = 0, l = from.length, ar; i < l; i++) {
        if (ar || !(i in from)) {
            if (!ar) ar = Array.prototype.slice.call(from, 0, i);
            ar[i] = from[i];
        }
    }
    return to.concat(ar || Array.prototype.slice.call(from));
};
Object.defineProperty(exports, "__esModule", { value: true });
var react_1 = require("react");
var react_native_1 = require("react-native");
var NewAppScreen_1 = require("react-native/Libraries/NewAppScreen");
var SECONDS_TO_SCAN_FOR = 7;
var SERVICE_UUIDS = [];
var ALLOW_DUPLICATES = true;
var react_native_ble_manager_1 = require("react-native-ble-manager");
var BleManagerModule = react_native_1.NativeModules.BleManager;
var bleManagerEmitter = new react_native_1.NativeEventEmitter(BleManagerModule);
var App = function () {
    var _a = (0, react_1.useState)(false), isScanning = _a[0], setIsScanning = _a[1];
    var _b = (0, react_1.useState)(new Map()), peripherals = _b[0], setPeripherals = _b[1];
    console.debug('peripherals map updated', __spreadArray([], peripherals.entries(), true));
    var addOrUpdatePeripheral = function (id, updatedPeripheral) {
        // new Map() enables changing the reference & refreshing UI.
        // TOFIX not efficient.
        setPeripherals(function (map) { return new Map(map.set(id, updatedPeripheral)); });
    };
    var startScan = function () {
        if (!isScanning) {
            // reset found peripherals before scan
            setPeripherals(new Map());
            try {
                console.debug('[startScan] starting scan...');
                setIsScanning(true);
                react_native_ble_manager_1.default.scan(SERVICE_UUIDS, SECONDS_TO_SCAN_FOR, ALLOW_DUPLICATES, {
                    matchMode: react_native_ble_manager_1.BleScanMatchMode.Sticky,
                    scanMode: react_native_ble_manager_1.BleScanMode.LowLatency,
                    callbackType: react_native_ble_manager_1.BleScanCallbackType.AllMatches,
                })
                    .then(function () {
                    console.debug('[startScan] scan promise returned successfully.');
                })
                    .catch(function (err) {
                    console.error('[startScan] ble scan returned in error', err);
                });
            }
            catch (error) {
                console.error('[startScan] ble scan error thrown', error);
            }
        }
    };
    var handleStopScan = function () {
        setIsScanning(false);
        console.debug('[handleStopScan] scan is stopped.');
    };
    var handleDisconnectedPeripheral = function (event) {
        var peripheral = peripherals.get(event.peripheral);
        if (peripheral) {
            console.debug("[handleDisconnectedPeripheral][".concat(peripheral.id, "] previously connected peripheral is disconnected."), event.peripheral);
            addOrUpdatePeripheral(peripheral.id, __assign(__assign({}, peripheral), { connected: false }));
        }
        console.debug("[handleDisconnectedPeripheral][".concat(event.peripheral, "] disconnected."));
    };
    var handleUpdateValueForCharacteristic = function (data) {
        console.debug("[handleUpdateValueForCharacteristic] received data from '".concat(data.peripheral, "' with characteristic='").concat(data.characteristic, "' and value='").concat(data.value, "'"));
    };
    var handleDiscoverPeripheral = function (peripheral) {
        console.debug('[handleDiscoverPeripheral] new BLE peripheral=', peripheral);
        if (!peripheral.name) {
            peripheral.name = 'NO NAME';
        }
        addOrUpdatePeripheral(peripheral.id, peripheral);
    };
    var togglePeripheralConnection = function (peripheral) { return __awaiter(void 0, void 0, void 0, function () {
        var error_1;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    if (!(peripheral && peripheral.connected)) return [3 /*break*/, 5];
                    _a.label = 1;
                case 1:
                    _a.trys.push([1, 3, , 4]);
                    return [4 /*yield*/, react_native_ble_manager_1.default.disconnect(peripheral.id)];
                case 2:
                    _a.sent();
                    return [3 /*break*/, 4];
                case 3:
                    error_1 = _a.sent();
                    console.error("[togglePeripheralConnection][".concat(peripheral.id, "] error when trying to disconnect device."), error_1);
                    return [3 /*break*/, 4];
                case 4: return [3 /*break*/, 7];
                case 5: return [4 /*yield*/, connectPeripheral(peripheral)];
                case 6:
                    _a.sent();
                    _a.label = 7;
                case 7: return [2 /*return*/];
            }
        });
    }); };
    var retrieveConnected = function () { return __awaiter(void 0, void 0, void 0, function () {
        var connectedPeripherals, i, peripheral, error_2;
        return __generator(this, function (_a) {
            switch (_a.label) {
                case 0:
                    _a.trys.push([0, 2, , 3]);
                    return [4 /*yield*/, react_native_ble_manager_1.default.getConnectedPeripherals()];
                case 1:
                    connectedPeripherals = _a.sent();
                    if (connectedPeripherals.length === 0) {
                        console.warn('[retrieveConnected] No connected peripherals found.');
                        return [2 /*return*/];
                    }
                    console.debug('[retrieveConnected] connectedPeripherals', connectedPeripherals);
                    for (i = 0; i < connectedPeripherals.length; i++) {
                        peripheral = connectedPeripherals[i];
                        addOrUpdatePeripheral(peripheral.id, __assign(__assign({}, peripheral), { connected: true }));
                    }
                    return [3 /*break*/, 3];
                case 2:
                    error_2 = _a.sent();
                    console.error('[retrieveConnected] unable to retrieve connected peripherals.', error_2);
                    return [3 /*break*/, 3];
                case 3: return [2 /*return*/];
            }
        });
    }); };
    var connectPeripheral = function (peripheral) { return __awaiter(void 0, void 0, void 0, function () {
        var peripheralData, rssi, _i, _a, characteristic, _b, _c, descriptor, data, error_3, p, error_4;
        return __generator(this, function (_d) {
            switch (_d.label) {
                case 0:
                    _d.trys.push([0, 14, , 15]);
                    if (!peripheral) return [3 /*break*/, 13];
                    addOrUpdatePeripheral(peripheral.id, __assign(__assign({}, peripheral), { connecting: true }));
                    return [4 /*yield*/, react_native_ble_manager_1.default.connect(peripheral.id)];
                case 1:
                    _d.sent();
                    console.debug("[connectPeripheral][".concat(peripheral.id, "] connected."));
                    addOrUpdatePeripheral(peripheral.id, __assign(__assign({}, peripheral), { connecting: false, connected: true }));
                    // before retrieving services, it is often a good idea to let bonding & connection finish properly
                    return [4 /*yield*/, sleep(900)];
                case 2:
                    // before retrieving services, it is often a good idea to let bonding & connection finish properly
                    _d.sent();
                    return [4 /*yield*/, react_native_ble_manager_1.default.retrieveServices(peripheral.id)];
                case 3:
                    peripheralData = _d.sent();
                    console.debug("[connectPeripheral][".concat(peripheral.id, "] retrieved peripheral services"), peripheralData);
                    return [4 /*yield*/, react_native_ble_manager_1.default.readRSSI(peripheral.id)];
                case 4:
                    rssi = _d.sent();
                    console.debug("[connectPeripheral][".concat(peripheral.id, "] retrieved current RSSI value: ").concat(rssi, "."));
                    if (!peripheralData.characteristics) return [3 /*break*/, 12];
                    _i = 0, _a = peripheralData.characteristics;
                    _d.label = 5;
                case 5:
                    if (!(_i < _a.length)) return [3 /*break*/, 12];
                    characteristic = _a[_i];
                    if (!characteristic.descriptors) return [3 /*break*/, 11];
                    _b = 0, _c = characteristic.descriptors;
                    _d.label = 6;
                case 6:
                    if (!(_b < _c.length)) return [3 /*break*/, 11];
                    descriptor = _c[_b];
                    _d.label = 7;
                case 7:
                    _d.trys.push([7, 9, , 10]);
                    return [4 /*yield*/, react_native_ble_manager_1.default.readDescriptor(peripheral.id, characteristic.service, characteristic.characteristic, descriptor.uuid)];
                case 8:
                    data = _d.sent();
                    console.debug("[connectPeripheral][".concat(peripheral.id, "] descriptor read as:"), data);
                    return [3 /*break*/, 10];
                case 9:
                    error_3 = _d.sent();
                    console.error("[connectPeripheral][".concat(peripheral.id, "] failed to retrieve descriptor ").concat(descriptor, " for characteristic ").concat(characteristic, ":"), error_3);
                    return [3 /*break*/, 10];
                case 10:
                    _b++;
                    return [3 /*break*/, 6];
                case 11:
                    _i++;
                    return [3 /*break*/, 5];
                case 12:
                    p = peripherals.get(peripheral.id);
                    if (p) {
                        addOrUpdatePeripheral(peripheral.id, __assign(__assign({}, peripheral), { rssi: rssi }));
                    }
                    _d.label = 13;
                case 13: return [3 /*break*/, 15];
                case 14:
                    error_4 = _d.sent();
                    console.error("[connectPeripheral][".concat(peripheral.id, "] connectPeripheral error"), error_4);
                    return [3 /*break*/, 15];
                case 15: return [2 /*return*/];
            }
        });
    }); };
    function sleep(ms) {
        return new Promise(function (resolve) { return setTimeout(resolve, ms); });
    }
    (0, react_1.useEffect)(function () {
        try {
            react_native_ble_manager_1.default.start({ showAlert: false })
                .then(function () { return console.debug('BleManager started.'); })
                .catch(function (error) {
                return console.error('BeManager could not be started.', error);
            });
        }
        catch (error) {
            console.error('unexpected error starting BleManager.', error);
            return;
        }
        var listeners = [
            bleManagerEmitter.addListener('BleManagerDiscoverPeripheral', handleDiscoverPeripheral),
            bleManagerEmitter.addListener('BleManagerStopScan', handleStopScan),
            bleManagerEmitter.addListener('BleManagerDisconnectPeripheral', handleDisconnectedPeripheral),
            bleManagerEmitter.addListener('BleManagerDidUpdateValueForCharacteristic', handleUpdateValueForCharacteristic),
        ];
        handleAndroidPermissions();
        return function () {
            console.debug('[app] main component unmounting. Removing listeners...');
            for (var _i = 0, listeners_1 = listeners; _i < listeners_1.length; _i++) {
                var listener = listeners_1[_i];
                listener.remove();
            }
        };
        // eslint-disable-next-line react-hooks/exhaustive-deps
    }, []);
    var handleAndroidPermissions = function () {
        if (react_native_1.Platform.OS === 'android' && react_native_1.Platform.Version >= 31) {
            react_native_1.PermissionsAndroid.requestMultiple([
                react_native_1.PermissionsAndroid.PERMISSIONS.BLUETOOTH_SCAN,
                react_native_1.PermissionsAndroid.PERMISSIONS.BLUETOOTH_CONNECT,
            ]).then(function (result) {
                if (result) {
                    console.debug('[handleAndroidPermissions] User accepts runtime permissions android 12+');
                }
                else {
                    console.error('[handleAndroidPermissions] User refuses runtime permissions android 12+');
                }
            });
        }
        else if (react_native_1.Platform.OS === 'android' && react_native_1.Platform.Version >= 23) {
            react_native_1.PermissionsAndroid.check(react_native_1.PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION).then(function (checkResult) {
                if (checkResult) {
                    console.debug('[handleAndroidPermissions] runtime permission Android <12 already OK');
                }
                else {
                    react_native_1.PermissionsAndroid.request(react_native_1.PermissionsAndroid.PERMISSIONS.ACCESS_FINE_LOCATION).then(function (requestResult) {
                        if (requestResult) {
                            console.debug('[handleAndroidPermissions] User accepts runtime permission android <12');
                        }
                        else {
                            console.error('[handleAndroidPermissions] User refuses runtime permission android <12');
                        }
                    });
                }
            });
        }
    };
    var renderItem = function (_a) {
        var _b;
        var item = _a.item;
        var backgroundColor = item.connected ? '#069400' : NewAppScreen_1.Colors.white;
        return (<react_native_1.TouchableHighlight underlayColor="#0082FC" onPress={function () { return togglePeripheralConnection(item); }}>
        <react_native_1.View style={[styles.row, { backgroundColor: backgroundColor }]}>
          <react_native_1.Text style={styles.peripheralName}>
            {/* completeLocalName (item.name) & shortAdvertisingName (advertising.localName) may not always be the same */}
            {item.name} - {(_b = item === null || item === void 0 ? void 0 : item.advertising) === null || _b === void 0 ? void 0 : _b.localName}
            {item.connecting && ' - Connecting...'}
          </react_native_1.Text>
          <react_native_1.Text style={styles.rssi}>RSSI: {item.rssi}</react_native_1.Text>
          <react_native_1.Text style={styles.peripheralId}>{item.id}</react_native_1.Text>
        </react_native_1.View>
      </react_native_1.TouchableHighlight>);
    };
    return (<>
      <react_native_1.StatusBar />
      <react_native_1.SafeAreaView style={styles.body}>
        <react_native_1.Pressable style={styles.scanButton} onPress={startScan}>
          <react_native_1.Text style={styles.scanButtonText}>
            {isScanning ? 'Scanning...' : 'Scan Bluetooth'}
          </react_native_1.Text>
        </react_native_1.Pressable>

        <react_native_1.Pressable style={styles.scanButton} onPress={retrieveConnected}>
          <react_native_1.Text style={styles.scanButtonText}>
            {'Retrieve connected peripherals'}
          </react_native_1.Text>
        </react_native_1.Pressable>

        {Array.from(peripherals.values()).length === 0 && (<react_native_1.View style={styles.row}>
            <react_native_1.Text style={styles.noPeripherals}>
              No Peripherals, press "Scan Bluetooth" above.
            </react_native_1.Text>
          </react_native_1.View>)}

        <react_native_1.FlatList data={Array.from(peripherals.values())} contentContainerStyle={{ rowGap: 12 }} renderItem={renderItem} keyExtractor={function (item) { return item.id; }}/>
      </react_native_1.SafeAreaView>
    </>);
};
var boxShadow = {
    shadowColor: '#000',
    shadowOffset: {
        width: 0,
        height: 2,
    },
    shadowOpacity: 0.25,
    shadowRadius: 3.84,
    elevation: 5,
};
var styles = react_native_1.StyleSheet.create({
    engine: {
        position: 'absolute',
        right: 10,
        bottom: 0,
        color: NewAppScreen_1.Colors.black,
    },
    scanButton: __assign({ alignItems: 'center', justifyContent: 'center', paddingVertical: 16, backgroundColor: '#0a398a', margin: 10, borderRadius: 12 }, boxShadow),
    scanButtonText: {
        fontSize: 20,
        letterSpacing: 0.25,
        color: NewAppScreen_1.Colors.white,
    },
    body: {
        backgroundColor: '#0082FC',
        flex: 1,
    },
    sectionContainer: {
        marginTop: 32,
        paddingHorizontal: 24,
    },
    sectionTitle: {
        fontSize: 24,
        fontWeight: '600',
        color: NewAppScreen_1.Colors.black,
    },
    sectionDescription: {
        marginTop: 8,
        fontSize: 18,
        fontWeight: '400',
        color: NewAppScreen_1.Colors.dark,
    },
    highlight: {
        fontWeight: '700',
    },
    footer: {
        color: NewAppScreen_1.Colors.dark,
        fontSize: 12,
        fontWeight: '600',
        padding: 4,
        paddingRight: 12,
        textAlign: 'right',
    },
    peripheralName: {
        fontSize: 16,
        textAlign: 'center',
        padding: 10,
    },
    rssi: {
        fontSize: 12,
        textAlign: 'center',
        padding: 2,
    },
    peripheralId: {
        fontSize: 12,
        textAlign: 'center',
        padding: 2,
        paddingBottom: 20,
    },
    row: __assign({ marginLeft: 10, marginRight: 10, borderRadius: 20 }, boxShadow),
    noPeripherals: {
        margin: 10,
        textAlign: 'center',
        color: NewAppScreen_1.Colors.white,
    },
});
exports.default = App;
