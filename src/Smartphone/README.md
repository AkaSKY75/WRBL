### The following steps are required to run the mobile application

1. Make sure you have both `NodeJS` and `npm` installed
2. `npx create-expo-app app_name && cd app_name`
3. `npx expo install react-native-bluetooth-classic with-rn-bluetooth-classic`
4. `npx expo install expo-device`
5. Create a file called `eas.json` and add to its content:
```
{
	"build": {
		"development": {
	      "developmentClient": true,
	      "distribution": "internal"
		},
		"preview": {
			"distribution": "internal"
		},
		"production": {}
	}
}
```
6. Edit `app.json` file and add to `"plugins"` key the following:
```
"plugins": [
	[
		"with-rn-bluetooth-classic",
        	{
          		"peripheralUsageDescription": "Allow myDevice to check bluetooth peripheral info",
          		"alwaysUsageDescription": "Allow myDevice to always use bluetooth info",
          		"protocols": [
            		"com.myCompany.p1",
            		"com.myCompany.p2"
          		]
        	}
      ]
]
```
7. `npx npm install eas-cli`
8. `npx expo prebuild`
9. `npx expo install expo-dev-client`
10. `npx expo run:android`