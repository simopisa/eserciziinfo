package app;

import java.net.*;
import java.util.Date;
import java.util.HashMap;

/**
 * * author: simone pisoni ! 09/01/2020 ? server udp
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
                serverSocket.receive(pacchettoricevuto);
                int portaa = pacchettoricevuto.getPort();
                    // ======================================================================================================

                    // ======================================================================================================
                    System.out.println("connesso con " + pacchettoricevuto.getAddress() + ":" + portaa);
                    System.out.println("numero client connessi:" + Clients.size());
                    // ======================================================================================================
                    if (Clients.get(pacchettoricevuto.getAddress().toString() + ":" + portaa) == null) {
                        if (Clients.size() >= 10) {
                            System.out.println("10 client connessi, attendi che qualcuno si disconnetta");
                        } else {
                            Clients.put(pacchettoricevuto.getAddress().toString() + ":" + portaa, 1);
                            System.out.println(pacchettoricevuto.getAddress().toString() + ":" + portaa);
                            System.out.println("nuovo client aggiunto alla lista");
                        }

                        // ======================================================================================================
                    } else {
                        // ======================================================================================================
                        Clients.put(pacchettoricevuto.getAddress().toString(),
                                Clients.get((pacchettoricevuto.getAddress().toString())) + 1);

                        System.out.println(Clients.get(pacchettoricevuto.getAddress().toString()));
                        // ======================================================================================================
                    }
                    // ======================================================================================================
                    if (Clients.get(pacchettoricevuto.getAddress().toString() + ":" + portaa) >= 10) {

                        System.out.println("10 richieste effettuate, ora il servizio è a pagamento");
                        stringadainviare = "10 richieste effettuate, ora il servizio è a pagamento";
                        datidainviare = stringadainviare.getBytes();
                        pacchettodainviare = new DatagramPacket(datidainviare, datidainviare.length, indirizzoip, port);
                        serverSocket.send(pacchettodainviare);
                        // ======================================================================================================
                    } else {
                        // ======================================================================================================
                        stringaricevuta = new String(pacchettoricevuto.getData());
                        System.out.println("<<CLIENT: " + stringaricevuta);
                        // ======================================================================================================
                        int lunghezza = pacchettoricevuto.getLength();
                        stringaricevuta = stringaricevuta.substring(0, lunghezza);
                        // ======================================================================================================
                        indirizzoip = pacchettoricevuto.getAddress();
                        port = pacchettoricevuto.getPort();
                        Date oggi = new Date();
                        // ======================================================================================================
                        stringadainviare = oggi.toString();
                        datidainviare = stringadainviare.getBytes();
                        // ======================================================================================================
                        pacchettodainviare = new DatagramPacket(datidainviare, datidainviare.length, indirizzoip, port);
                        System.out.println(">>SERVER: " + stringadainviare);
                        serverSocket.send(pacchettodainviare);
                        // ======================================================================================================
                    }
                    // ======================================================================================================
                } while (!stringaricevuta.equals("fine"));
               
            

        } catch (Exception e) {
            // TODO: handle exception

        }

    }
}