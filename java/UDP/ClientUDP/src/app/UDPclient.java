package app;

import java.io.*;
import java.net.*;

class UDPClient {
    //===================================================================================================================
    String nomeserver;
    BufferedReader input;
    DatagramSocket clientSocket;
    InetAddress indirizzoip;
    int porta;
    byte[] bytedainviare;
    byte[] bytedaricevere;
    String stringaricevuta;
    String stringadainviare;
    DatagramPacket pacchettodainviare;
    DatagramPacket pacchettoricevuto;
    //===================================================================================================================
    public UDPClient(String nomeserver, int porta) {
        this.nomeserver = nomeserver;
        this.porta = porta;
    }

    public void connetti(){
        try {
            //===================================================================================================================
            input = new BufferedReader(new InputStreamReader(System.in));
            clientSocket = new DatagramSocket();
            indirizzoip = InetAddress.getByName(nomeserver);
            //===================================================================================================================
            bytedainviare = new byte[1024];
            bytedaricevere = new byte[1024];
            //===================================================================================================================
            }
        catch(Exception e){
      }
    }
    public void comunica() {
        try {
            do {
            //===================================================================================================================   
            System.out.println("Iserisci stringa da inviare: ");
            //===================================================================================================================
            stringadainviare = input.readLine();

            bytedainviare = stringadainviare.getBytes();
            //===================================================================================================================
            pacchettodainviare = new DatagramPacket(bytedainviare, bytedainviare.length, indirizzoip, porta);
            //===================================================================================================================
            clientSocket.send(pacchettodainviare);
            System.out.println(">>CLIENT: "+stringadainviare);
            //===================================================================================================================
            pacchettoricevuto = new DatagramPacket(bytedaricevere, bytedaricevere.length);
            //===================================================================================================================
            clientSocket.receive(pacchettoricevuto);
            //===================================================================================================================
            stringaricevuta= new String(pacchettoricevuto.getData());
            //===================================================================================================================
            System.out.println("<<SERVER:" + stringaricevuta);
            //===================================================================================================================
        } while (!stringadainviare.equals("fine"));
        System.out.println("chiudo la connessione");
            clientSocket.close();
        } catch (Exception e) {

        }

    }
}