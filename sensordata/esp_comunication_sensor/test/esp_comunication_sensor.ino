#ifdef ESP32
  #include <WiFi.h>
  #include <HTTPClient.h>
#else
  #include <ESP8266WiFi.h>
  #include <ESP8266HTTPClient.h>
  #include <WiFiClient.h>
#endif

#include <Wire.h>

// Replace with your network credentials
const char* ssid     = "Lee";
const char* password = "0839991622";
const char* serverName = "http://192.168.1.16/sensordata/post-esp-data.php";


String apiKeyValue = "tPmAT5Ab3j7F9";
String sensorName = "Sensor name";
String sensorLocation = "My Room";
int value1 = 12;
int value2 = 24;
int value3 = 36;

void setup() {
  Serial.begin(115200);
  WiFi.begin(ssid, password);
  Serial.println("Connecting");
  while(WiFi.status() != WL_CONNECTED) { 
    delay(500);
    Serial.print(".");
  }
  Serial.println("");
  Serial.print("Connected to WiFi network with IP Address: ");
  Serial.println(WiFi.localIP());

}


void loop() {
  //Check WiFi connection status
  if(WiFi.status()== WL_CONNECTED){
    WiFiClient client;
    HTTPClient http;

    http.begin(client,serverName);
    //http.begin(serverName);
    
    http.addHeader("Content-Type", "application/x-www-form-urlencoded");
    
    // Prepare your HTTP POST request data
    String httpRequestData ;
    value1 = value1+1;
    value2 = value2+1;
    value3 = value3+1;
    
    httpRequestData = "api_key=" + apiKeyValue + "&sensor=" + sensorName+ "&location=" + sensorLocation + "&value1=" + String(value1)+ "&value2=" + String(value2) + "&value3=" + String(value3) + "";
    Serial.print("httpRequestData: ");
    Serial.println(httpRequestData);
    
    int httpResponseCode = http.POST(httpRequestData);
     
    if (httpResponseCode>0) {
        Serial.print("HTTP Response code: ");
        Serial.println(httpResponseCode);
        }
    else {
        Serial.print("Error code: ");
        Serial.println(httpResponseCode);
        }
    
    // Free resources
    http.end();
  }
  else {
    Serial.println("WiFi Disconnected");
  }
  //Send an HTTP POST request every 15 seconds
  delay(15000);  
}
