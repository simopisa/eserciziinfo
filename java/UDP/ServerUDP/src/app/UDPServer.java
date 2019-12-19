package app;

import java.io.*;
import java.net.*;
import java.util.HashMap;

class UDPServer {
    // ======================================================================================================
    DatagramSocket serverSocket;
    byte[] datiricevuti;
    byte[] datidainviare;
    DatagramPacket pacchettoricevuto;
    String stringaricevuta;
    InetAddress indirizzoip;
    int port;
    String stringadainviare = "";
    DatagramPacket pacchettodainviare;
    HashMap<String, Integer> Clients;

    // ======================================================================================================
    public UDPServer(int port) {
        this.port = port;
        Clients = new HashMap<String, Integer>();
    }

    public void attendi() {
        try {
            // ======================================================================================================
            serverSocket = new DatagramSocket(port);
            datiricevuti = new byte[1024];
            datidainviare = new byte[1024];
            System.out.println("attendo la connesione");
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
                serverSocket.receive(pacchettoricevuto);
                System.out.println("connesso con " + pacchettoricevuto.getAddress() + ":" + pacchettoricevuto.getPort());
                if (Clients.get(pacchettoricevuto.getAddress().toString()) == null) {

                    Clients.put(pacchettoricevuto.getAddress().toString(), 1);
                    System.out.println("nuovo client aggiunto alla lista");
                } else {
                    Clients.put(pacchettoricevuto.getAddress().toString(),  Clients.get((pacchettoricevuto.getAddress().toString())) + 1);

                        System.out.println(Clients.get(pacchettoricevuto.getAddress().toString()));
                }
                if (Clients.get(pacchettoricevuto.getAddress().toString()) >= 10) {
                    System.out.println("10 richieste effettuate, ora il servizio è a pagamento");
                } else {
                    // ======================================================================================================
                    stringaricevuta = new String(pacchettoricevuto.getData());
                    System.out.println("<<CLIENT: " + stringaricevuta);
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

            } while (!stringaricevuta.equals("fine"));
            System.out.println("chiudo la connessione");
            serverSocket.close();
        } catch (Exception e) {
            // TODO: handle exception
        }

    }
}