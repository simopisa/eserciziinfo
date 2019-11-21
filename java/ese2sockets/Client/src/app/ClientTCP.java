package app;

import java.io.BufferedReader;

import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.*;
import java.util.Scanner;

/**
 * ClientTCP
 */
public class ClientTCP {

    private Socket miosocket; // per mettersi in ascolto
    private String stringdalserver;
    private DataOutputStream outversoserver; // scrivere sullo stream
    private BufferedReader indalserver; // stream input
    private String nomeserver;
    private int porta;// porta di ascolto
    private BufferedReader tastiera; // prendere da tastiera
    // =======================================================================================================================

    public ClientTCP(int porta, String nomeserver) {
        this.porta = porta;
        this.nomeserver = nomeserver;
        tastiera = new BufferedReader(new InputStreamReader(System.in));
    }

    // =======================================================================================================================
    public void connetti() {
        // =======================================================================================================================
        System.out.println("2-client in esecuzione");
        // =======================================================================================================================
        try {
            // =======================================================================================================================
            System.out.println("richedo la connessione");

            miosocket = new Socket(nomeserver, porta);

            indalserver = new BufferedReader(new InputStreamReader(miosocket.getInputStream()));

            outversoserver = new DataOutputStream(miosocket.getOutputStream());

            System.out.println("connesso con: " + nomeserver + ":" + porta);
            // =======================================================================================================================
        } catch (Exception e) {
            System.out.println("host sconosciuto");
        }
        // =======================================================================================================================
        // inizializzo il socket

    }

    // =======================================================================================================================
    public void comunica() {
        // client richiede stringa da inviare
        // invio stringa
        int scelta = 0;
        boolean controllo = true;
        // =======================================================================================================================
        do {

            // =======================================================================================================================
            try {

                // =======================================================================================================================

                System.out.print("*********************************\n1-ingredienti\n2-prezzo\n3-aquista\n0-esci\n*********************************\n");
                try {
                    do {
                        scelta = Integer.parseInt(tastiera.readLine());

                        if (scelta >= 0 && scelta < 4) {
                            controllo = false;
                        } else {
                            System.out.println("inserisci un numero compreso nel menù");
                        }
                    } while (controllo);
                } catch (Exception e) {
                    // TODO: handle exception
                }

                // =======================================================================================================================

                String[] ingredienti = { "IM", "IV", "IC" };
                String[] prezzo = { "PM", "PV", "PC" };

                // =======================================================================================================================

                switch (scelta) {
                case 1:
                    int sceltaing = sottomenu1();
                    outversoserver.writeBytes(ingredienti[sceltaing - 1] + "\n");
                    break;
                case 2:
                    int sceltaprezz = sottomenu1();
                    outversoserver.writeBytes(prezzo[sceltaprezz - 1] + "\n");
                    break;
                case 3:
                    String acqu = sottomenu2();
                    outversoserver.writeBytes(acqu + "\n");
                    break;
                case 0:
                    outversoserver.writeBytes("FINE" + "\n");
                    break;
                default:
                    System.out.println("inserisci un numero compreso nel menù");
                    break;
                }

                // =======================================================================================================================
                System.out.println("---attendo risposta dal server");
                // client attende la risposta e visualizza
                stringdalserver = indalserver.readLine();
                System.out.println("SERVER>>>"+stringdalserver);
                // =======================================================================================================================

                // =======================================================================================================================

            } catch (Exception e) {
                // TODO: handle exception
            }

            // =======================================================================================================================

        } while (scelta != 0);
        // =======================================================================================================================

        try {
            // chiudo la connessione
            miosocket.close();
        } catch (Exception e) {
            // TODO: handle exception
        }

        // =======================================================================================================================
    }

    // =======================================================================================================================
    private int sottomenu1() {
        // =======================================================================================================================

        Scanner input = new Scanner(System.in);
        int scelta1 = 1;

        // =======================================================================================================================

        do {

            // =======================================================================================================================

            try {

                // =======================================================================================================================

                if (scelta1 > 0 && scelta1 < 4) {
                    System.out.println("*********************************\n1) margherita\n2) vegetariana\n3) capricciosa\n*********************************");
                    scelta1 = Integer.parseInt(input.nextLine());
                } else {
                    System.out.println("inserisci un numero nel menù");
                }

                // =======================================================================================================================

            } catch (Exception e) {
                // TODO: handle exception
            }

            // =======================================================================================================================

        } while (scelta1 < 0 || scelta1 > 4);

        // =======================================================================================================================
        return scelta1;
    }
    // =======================================================================================================================

    private String sottomenu2() {

        // =======================================================================================================================

        Scanner input = new Scanner(System.in);
        String acquista = "ACQUISTA#";

        // =======================================================================================================================

        System.out.println("Quante margherite?");
        acquista = acquista + input.nextLine() + "#";
        System.out.println("Quante vegetariane?");
        acquista = acquista + input.nextLine() + "#";
        System.out.println("Quante capricciose?");
        acquista = acquista + input.nextLine();

        // =======================================================================================================================
        return acquista;
    }
    // =======================================================================================================================
}