
package app;

import java.io.*;
import java.net.*;
import java.util.HashMap;
import java.util.Map;
import java.util.Scanner;

public class ClientV {
    private String nomeServer; // indirizzo del server
    private int porta; // Porta per servizio
    private BufferedReader tastiera; // Buffer per l'input da tastiera
    private String stringaUtente; // Stringa inserita dall'utente
    private String stringaDalServer; // Stringa ricevuta dal server
    private DataOutputStream outVersoilServer; // Stream output
    private BufferedReader inDalServer; // Stream input
    private Socket miosocket;

    public ClientV(String nomeServer, int porta) {
        this.nomeServer = nomeServer;
        this.porta = porta;
        tastiera = new BufferedReader(new InputStreamReader(System.in));
    }

    public void connetti() {
        System.out.println(" 2 - Client partito in esecuzione");
        try {
            // inizializzazione dell'oggetto socket con ip e porta del server
            miosocket = new Socket(nomeServer, porta);
            // associo al socket due oggetti per effettuare la lettura e la scrittura
            outVersoilServer = new DataOutputStream(miosocket.getOutputStream());
            inDalServer = new BufferedReader(new InputStreamReader(miosocket.getInputStream()));
        } catch (UnknownHostException ex) {
            System.err.println("Host sconosciuto " + ex.getMessage());
        } catch (IOException ex) {
            System.err.println(ex.getMessage());
        }
    }

    public void comunica() {

        String scelta = "";
        try {

            do {
                switch (menu()) {
                case "1":
                    informazioni();
                    break;
                case "2":
                    prezzo();
                    break;
                case "3":
                    acquista();
                    break;
                case "4":
                    val();
                    break;
                case "5":
                    tipo();
                    break;
                case "0":
                    System.out.println("Arrivederci");
                    outVersoilServer.writeBytes("FINE\n");
                    break;
                default:
                    System.out.println("inserisci solo valori compresi tra 0 e 5");
                    break;
                }
                System.out.println("---attendo risposta dal server");
                // client attende la risposta e visualizza
                stringaDalServer = inDalServer.readLine();
                System.out.println("SERVER>>>"+stringaDalServer);
            } while ("0".compareTo(scelta) != 0);

            miosocket.close();
        } catch (IOException ex) {
            System.err.println("Errore durante la comunicazione. " + ex.getMessage());
        }


    }

    private void tipo() {
        Scanner in = new Scanner(System.in);
        System.out.println("----Tipo----\n1-bianco\n2-rosato\n3-rosso");
        String pippo = in.nextLine();
        if (pippo.compareTo("1") == 0) {
            try {
                outVersoilServer.writeBytes("t#bianco\n");
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        } else if (pippo.compareTo("2") == 0) {

            try {
                outVersoilServer.writeBytes("t#rosato\n");
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        } else {

            try {
                outVersoilServer.writeBytes("t#rosso\n");
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }
    }

    private void val() {
        Scanner in = new Scanner(System.in);
        System.out.println("----Valore magazzino----\n1-intero\n2-singolo prodotto");
        String pippo = in.nextLine();
        if (pippo.compareTo("1") == 0) {
            try {
                outVersoilServer.writeBytes("VMT\n");
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        } else {
            System.out.println("inserisci il codice del prodotto: ");
            String codice = in.nextLine();
            try {
                outVersoilServer.writeBytes("VM#" + codice + "\n");
            } catch (IOException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

    }

    private void acquista() {
        Scanner in = new Scanner(System.in);
        System.out.println("inserisci il codice del prodotto: ");
        String codice = in.nextLine();
        System.out.println("inserisci la quantità: ");
        String quant = in.nextLine();

        try {
            outVersoilServer.writeBytes("A#" + codice + "#" + quant + "\n");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void prezzo() {
        Scanner in = new Scanner(System.in);
        System.out.println("inserisci il codice del prodotto: ");
        String codice = in.nextLine();
        try {
            outVersoilServer.writeBytes("P#" + codice + "\n");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private void informazioni() {
        Scanner in = new Scanner(System.in);
        System.out.println("inserisci il codice del prodotto: ");
        String codice = in.nextLine();
        try {
            outVersoilServer.writeBytes("I#" + codice + "\n");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    private String menu() {
        Scanner in = new Scanner(System.in);
        System.out.println(
                "---------Azienda Vinicola-----------\n1-informazioni\n2-prezzo\n3-acquista\n4-valore magazzino\n5-tipo\n0-esci");
        return in.nextLine();
    }
}
