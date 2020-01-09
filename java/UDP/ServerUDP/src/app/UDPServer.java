package app;

import java.net.*;
import java.util.HashMap;
/** 
* * author: simone pisoni
* ! 09/01/2020
* ? server udp
*/
class UDPServer {
    // ======================================================================================================
    private DatagramSocket serverSocket;
    private byte[] datiricevuti;
    private byte[] datidainviare;
    private DatagramPacket pacchettoricevuto;
    private String stringaricevuta;
    private InetAddress indirizzoip;
    private int port;
    private String stringadainviare = "";
    private DatagramPacket pacchettodainviare;
    HashMap<String, Integer> Clients;
   
    // ======================================================================================================
    public UDPServer(int port) {
        this.port = port;
        Clients = new HashMap<String, Integer>();
    }
    // ======================================================================================================
    public void attendi() {
        try {
            // ======================================================================================================
            serverSocket = new DatagramSocket(port);
            datiricevuti = new byte[1024];
            datidainviare = new byte[1024];
            // ======================================================================================================
        } catch (Exception e) {
            // TODO: handle exception
        }

    }

    public void Comunica() {
        try {

            do {

                // ======================================================================================================
                pacchettoricevuto = new DatagramPacket(datiricevuti, datiricevuti.length);
                // ======================================================================================================                
                serverSocket.receive(pacchettoricevuto);
                // ======================================================================================================
                System.out.println("connesso con " + pacchettoricevuto.getAddress() + ":" + pacchettoricevuto.getPort());
                // ======================================================================================================
                if (Clients.get(pacchettoricevuto.getAddress().toString()) == null) {

                    Clients.put(pacchettoricevuto.getAddress().toString(), 1);
                    System.out.println("nuovo client aggiunto alla lista");

                // ======================================================================================================
                } else {
                    // ======================================================================================================
                    Clients.put(pacchettoricevuto.getAddress().toString(),  Clients.get((pacchettoricevuto.getAddress().toString())) + 1);

                    System.out.println(Clients.get(pacchettoricevuto.getAddress().toString()));
                    // ======================================================================================================
                }
                // ======================================================================================================
                if (Clients.get(pacchettoricevuto.getAddress().toString()) >= 10) {

                    System.out.println("10 richieste effettuate, ora il servizio è a pagamento");
                // ======================================================================================================
                } else {
                    // ======================================================================================================
                    stringaricevuta = new String(pacchettoricevuto.getData());
                    System.out.println("<<CLIENT: " + stringaricevuta);
                    // ======================================================================================================
                    int lunghezza=pacchettoricevuto.getLength();
                    stringaricevuta=stringaricevuta.substring(0, lunghezza);
                    // ======================================================================================================
                    indirizzoip = pacchettoricevuto.getAddress();
                    port = pacchettoricevuto.getPort();
                    // ======================================================================================================
                    stringadainviare = stringaricevuta.toUpperCase();
                    datidainviare = stringadainviare.getBytes();
                    // ======================================================================================================
                    pacchettodainviare = new DatagramPacket(datidainviare, datidainviare.length, indirizzoip, port);
                    System.out.println(">>SERVER: " + stringadainviare);
                    serverSocket.send(pacchettodainviare);
                    // ======================================================================================================
                }
            // ======================================================================================================
            } while (!stringaricevuta.equals("fine"));
            System.out.println("chiudo la connessione");
            serverSocket.close();
        } catch (Exception e) {
            //TODO: handle exception
             
        }

    }
}