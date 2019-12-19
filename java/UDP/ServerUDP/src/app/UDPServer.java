package app;

import java.io.*;
import java.net.*;

class UDPServer {
    // ==================================================================================
    DatagramSocket serverSocket;
    byte[] datiricevuti;
    byte[] datidainviare;
    DatagramPacket pacchettoricevuto;
    String stringaricevuta;
    InetAddress indirizzoip;
    int port;
    String stringadainviare = "";
    DatagramPacket pacchettodainviare;

    // ==================================================================================
    public UDPServer(int port){
        this.port=port;
    }
    public void attendi() {
        try {
            // ==================================================================================
            serverSocket = new DatagramSocket(port);
            datiricevuti = new byte[1024];
            datidainviare = new byte[1024];
            System.out.println("attendo la connesione");
            // ==================================================================================
        } catch (Exception e) {
            // TODO: handle exception
        }

    }

    public void Comunica() {
        try {

           do {
                // ==================================================================================
                pacchettoricevuto = new DatagramPacket(datiricevuti, datiricevuti.length);
                serverSocket.receive(pacchettoricevuto);
                System.out.println("connesso con "+pacchettoricevuto.getAddress()+":"+pacchettoricevuto.getPort());
                // ==================================================================================
                stringaricevuta = new String(pacchettoricevuto.getData());
                System.out.println("<<CLIENT: " + stringaricevuta);
                // ==================================================================================
                indirizzoip = pacchettoricevuto.getAddress();
                port = pacchettoricevuto.getPort();
                // ==================================================================================
                stringadainviare = stringaricevuta.toUpperCase();
                datidainviare = stringadainviare.getBytes();
                // ==================================================================================
                pacchettodainviare = new DatagramPacket(datidainviare, datidainviare.length, indirizzoip, port);
                System.out.println(">>SERVER: "+stringadainviare);
                serverSocket.send(pacchettodainviare);
                // ==================================================================================
           }while (!stringaricevuta.equals("fine"));
            System.out.println("chiudo la connessione");
            serverSocket.close();
        } catch (Exception e) {
            // TODO: handle exception
        }

    }
}