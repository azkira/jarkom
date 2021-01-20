#include <BearSSLHelpers.h>
#include <CertStoreBearSSL.h>
#include <ESP8266WiFi.h>
#include <ESP8266WiFiAP.h>
#include <ESP8266WiFiGeneric.h>
#include <ESP8266WiFiGratuitous.h>
#include <ESP8266WiFiMulti.h>
#include <ESP8266WiFiScan.h>
#include <ESP8266WiFiSTA.h>
#include <ESP8266WiFiType.h>
#include <WiFiClient.h>
#include <WiFiClientSecure.h>
#include <WiFiClientSecureAxTLS.h>
#include <WiFiClientSecureBearSSL.h>
#include <WiFiServer.h>
#include <WiFiServerSecure.h>
#include <WiFiServerSecureAxTLS.h>
#include <WiFiServerSecureBearSSL.h>
#include <WiFiUdp.h>

//Konfigurasi WiFi
const char *ssid = "RUMAH ZALFA";
const char *password = "omanyazalfa";

//Inisiasi pin NodeMCU
int led = 12;                 //Pin LED
int sensor =13;               //Pin Sensor PIR

//IP Address Server yang terpasang XAMPP
const char *host = "192.168.1.8";
 
void setup() {
  Serial.begin(115200);
  
  WiFi.mode(WIFI_STA);
  WiFi.begin(ssid, password);
  Serial.println("");
 
  Serial.print("Connecting");
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }
 
  //Pemberitahuan Koneksi Berhasil
  Serial.println("");
  Serial.print("Connected to ");
  Serial.println(ssid);
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());
}
 
int value = 0;
 
void loop() {
  // Proses Pengiriman Data
  delay(1000);
  ++value;
 
  // Program Membaca Sensor Digital PIR 
  int valPIR = digitalRead(sensor);
  if (valPIR == 1){
    Serial.println("Ada Sesuatu");
    digitalWrite(led,HIGH);
    delay(1000);
    digitalWrite(led,LOW);
    delay(1000);
  }
  else {
    Serial.println("Tidak Ada Objek");
    digitalWrite(led,LOW);
    delay(1000);
  }
 
  Serial.print("connecting to ");
  Serial.println(host);
 
// Mengirimkan ke alamat host  
  WiFiClient client;
  const int httpPort = 80;
  if (!client.connect(host, httpPort)) {
    Serial.println("connection failed");
    return;
  }
 
// Isi Konten IP NodeMCU
  String url = "/jarkom-main/includes/retrieve.php?status_data=";
  url += valPIR;
 
  Serial.print("Requesting URL: ");
  Serial.println(url);
 
// Mengirimkan Request ke Server 
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " + host + "\r\n" +
               "Connection: close\r\n\r\n");
  unsigned long timeout = millis();
  while (client.available() == 0) {
    if (millis() - timeout > 1000) {
      Serial.println(">>> Client Timeout !");
      client.stop();
      return;
    }
  }
 
// Read all the lines of the reply from server and print them to Serial
  while (client.available()) {
    String line = client.readStringUntil('\r');
    Serial.print(line);
  }
 
  Serial.println();
  Serial.println("closing connection");
}
