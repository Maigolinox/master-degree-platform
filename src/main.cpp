#include <Arduino.h>
#include <WiFi.h>
#include <PubSubClient.h>
//CONFIGURACIÓN DE LA RED
const char* ssid="TELECABLEH4A_9.E";
const char* password="Miketh0015";
//CONEXIÓN A SERVIDOR MQTT
const char *mqtt_server="iotmaigolinox99.tk";
const int mqtt_port=1883;
const char *mqtt_user="Test_maigolinox";
const char *mqtt_pass="121212";
//PARAMETROS NECESARIOS PARA LAS LIBRERÍAS
WiFiClient espClient;
//SE ESPECIFICA EN LA LIBRERIA POR DONDE ENTRARÁN Y DONDE SALDRÁN LAS CONEXIONES
PubSubClient client(espClient);
//VARIABLE QUE ALMACENA EL ULTIMO MENSAJE
long lastMsg=0;
//ARREGLO DE CARACTERES DEBIDO A QUE NO SE PUEDE RECIBIR LA CADENA DE CARACTERES
//COMO UN STRING
char msg[50];
//VARIABLES QUE RECIBE EL PANLE DE CONTROL
int temp1=0;
int temp2=1;
int volts=2;
int int_conex=0;
//**************************************
//******DECLARACIÓN DE FUNCIONES********
//**************************************
void setup_wifi();
void callback(char* topic, byte* payload, unsigned int length);//PAYLOAD es el mensaje
void reconnect();

void setup() {
  pinMode(BUILTIN_LED, OUTPUT);
  Serial.begin(115200);
  //ESTRICTAMENTE  EN C++ NO ES POSIBLE LLAMAR UNA FUNCIÓN QUE NO ESTRICTAMENTE
  //ASÍ QUE PARA SOLVENTAR EL PROBLEMA SE DECLARA COMO SE NOTA EN LA BANDERA DE
  //FUNCIONES, IDE DE ARDUINO PERMITE HACER ESO.
  setup_wifi();
  //ESTA LINEA AYUDA A GENERAR NUMEROS ALEATORIOS DE MANERA SEGURA
  randomSeed(micros());
  //SE PASA A LA LIBRERIA LOS PARAMETROS A LOS QUE SE CONECTARÁ
  client.setServer(mqtt_server,mqtt_port);
  client.setCallback(callback);
}

void loop() {
  //EN CASO DE QUE EL INTERNET SE CAIGA SE VUELVE A RECONECTAR
  if(!client.connected()){
    reconnect();
  }
  client.loop();

}


void setup_wifi(){
  delay(10);
  Serial.println();
  //Línea de conexión a red
  Serial.println("Conectando a: ");
  Serial.println(ssid);
  //Inicialización de librería
  WiFi.begin(ssid,password);
  while(WiFi.status() !=WL_CONNECTED){
    delay(500);
    Serial.println(".");
    int_conex++;
    if(int_conex>=20){
      int_conex=0;
      Serial.println("FALLO DE CONEXIÓN VERIFIQUE CREDENCIALES");
      delay(10000);
    }
  }
  Serial.println("");
  Serial.println("Conectado a red WiFi: ");
  Serial.print(ssid);
  Serial.println("Dirección IP: ");
  Serial.println(WiFi.localIP());
}

//******************************************************************************
//***************** EJECUCION AL RECIBIR UN MENSAJE ****************************
//******************************************************************************

void callback(char* topic, byte* payload, unsigned int length){
  String incoming="";
  Serial.print("Mensaje recibido desde tópico-> ");
  Serial.print(topic);
  Serial.println("");
  for(int i=0;i<length;i++){
    incoming+=(char)payload[i];
  }
  //FUNCIÓN QUE LIMPIA LA CADENA DE CARACTERES RECIBIDA
  incoming.trim();
  Serial.println("Mensaje recibido-> "+incoming);

  if(incoming=="on"){
    digitalWrite(BUILTIN_LED,HIGH);
  }else{
    digitalWrite(BUILTIN_LED,LOW);
  }
}
//******************************************************************************
//***************** FUNCIÒN DE RECONEXIÒN ****************************
//******************************************************************************

void reconnect(){
  while(!client.connected()){
    Serial.print("Intentando conexión con servidor MQTT...");
    String clientId="esp32_";
    clientId+=String(random(0xffff),HEX);
    //INTENTO DE CONEXIÓN
    if(client.connect(clientId.c_str(),mqtt_user,mqtt_pass)){
      Serial.println("Conectado");
      //SE SUSCRIBE
      client.subscribe("led1");
      client.subscribe("led2");
    }else{
      Serial.print("FALLO DE CONEXIÓN CON ERROR -> ");
      Serial.print(client.state());
      Serial.println("SIGUIENTE INTENTO EN 5 SEGUNDOS");
      delay(5000);
    }
  }
}
