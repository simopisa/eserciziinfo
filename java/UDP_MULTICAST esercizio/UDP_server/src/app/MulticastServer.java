package app;
// ===========================================================================================================================
import java.io.IOException;
import java.net.DatagramPacket;
import java.net.InetAddress;
import java.net.MulticastSocket;
import java.net.UnknownHostException;
import java.nio.channels.DatagramChannel;
import java.util.Date;
import java.util.Scanner;

//===========================================================================================================================
/**
 * MulticastServer
 * 
 * * author: simone pisoni 
 * ! 09/01/2020 
 * ? client udp
 */
// ===========================================================================================================================
public class MulticastServer {

    // ===========================================================================================================================

    private MulticastSocket mSocket;
    private byte[] bufferout;
    InetAddress gruppo;
    int porta;

    // ===========================================================================================================================

    public MulticastServer(int porta, String ip) {

        // ===========================================================================================================================
        this.porta = porta;
        bufferout = new byte[1024];
        // ===========================================================================================================================
        try {
            this.gruppo = InetAddress.getByName(ip);
        } catch (UnknownHostException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        // ===========================================================================================================================
        try {
            mSocket = new MulticastSocket();
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        // ===========================================================================================================================
    }

    /**
     * ===========================================================================================================================
     ** Metodo comunica
     * ===========================================================================================================================
     */
    public void comunica() {
        // ===========================================================================================================================
        int acalda;
        int lconfortM;
        int leconomia;
        System.out.println("inserisci la temperatura dell'acqua calda");
        Scanner in=new Scanner(System.in);
        acalda=in.nextInt();
        

        String invia = "";
        DatagramPacket pacchetto;
        int secondi = 20;
        // ===========================================================================================================================
        while (secondi > 0) {

            invia = new Date().toString();
            bufferout = invia.getBytes();
            pacchetto = new DatagramPacket(bufferout, bufferout.length, gruppo, porta);

            // ===========================================================================================================================
            try {
                mSocket.send(pacchetto);
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
            // ===========================================================================================================================
            secondi--;
            // ===========================================================================================================================
            try {
                Thread.sleep(1000);
            } catch (InterruptedException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
            // ===========================================================================================================================
           System.out.println("Server attivo per altri: "+secondi+" sec");
        }

        bufferout="fine".getBytes();
        pacchetto=new DatagramPacket(bufferout, bufferout.length,gruppo,porta);

        // ===========================================================================================================================
        try {
            mSocket.send(pacchetto);
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
        // ===========================================================================================================================
        mSocket.close();
        // ===========================================================================================================================
    }

}