/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package app;

import java.io.BufferedReader;
import java.io.DataOutputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.Socket;
import java.util.logging.Level;
import java.util.logging.Logger;

public class ThreadV implements Runnable {
    private Socket client;
    private BufferedReader inDalClient;
    private DataOutputStream outClient;

    public ThreadV(Socket client) {
        this.client = client;
        try {
            inDalClient = new BufferedReader(new InputStreamReader(client.getInputStream()));
            outClient = new DataOutputStream(client.getOutputStream());
        } catch (IOException ex) {
            Logger.getLogger(ThreadV.class.getName()).log(Level.SEVERE, null, ex);
        }

    }

    @Override
    public void run() {
        try {
            comunica();
        } catch (IOException ex) {
            Logger.getLogger(ThreadV.class.getName()).log(Level.SEVERE, null, ex);
        }
    }

    public void comunica() throws IOException {
        String comandi[][] = { { "C100", "vino bianco toscana igt", "15", "12", "bianco" },
                { "C102", "vino rosato toscana igt", "17", "11", "rosato" },
                { "C103", "Vino Chianti Colli Senesi Poggio Orlando", "20", "22", "rosato" },
                { "C104", "Vin Santo del Chianti DOC Riserva", "35", "10", "bianco" },
                { "C105", "Vin Santo del Chianti DOC", "20", "30", "rosato" },
                { "C106", "Vino novello toscana IGT", "15", "24", "rosso" },
                { "C107", "Vino bianco toscana IGT le forcacce", "15", "11", "bianco" },
                { "C108", "Vino rosso toscana IGT infernaccio", "20", "9", "rosso" }, };
        String ricevuta = "";
        Boolean continua = true;
        // la comunicazione continua finche il server non riceve fine
        while (continua) {
            ricevuta = inDalClient.readLine();
            System.out.println("Ricevuta dal client " + client + ",messaggio :" + ricevuta);
            ricevuta = ricevuta.toUpperCase();
            String ricevuta1[] = ricevuta.split("#");
            switch (ricevuta1[0]) {
            case "I":
                ricerca1(ricevuta1[1], comandi, 1);
                break;
            case "P":
                ricerca1(ricevuta1[1], comandi, 2);
                break;
            case "A":
                acqui(ricevuta1[1], ricevuta1[2], comandi);
                break;
            case "VMT":

                break;
            default:
                break;
            }

            if ("FINE".equals(ricevuta)) {
                continua = false;
                System.out.println("inizio fase disconnessione");
            }
            System.out.println("Ritrasmetto messaggio " + ricevuta);
            outClient.writeBytes(ricevuta + "\n");
        }
        client.close();
        System.out.println("disconnessione avvenuta");
    }

    private void acqui(String cod, String qunt, String[][] comandi) {
        String dainviare = " ";
        int quaa = Integer.parseInt(qunt);

        for (int i = 0; i < 8; i++) {
            if (comandi[i][0].equals(cod)) {
                dainviare = comandi[i][2];
            }

        }
        int prezzo = Integer.parseInt(dainviare);
        prezzo = prezzo * quaa;
        try {
            outClient.writeBytes(prezzo + "\n");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

    }

    private void ricerca1(String comando, String[][] comandi, int val) {
        String dainviare = " ";
        for (int i = 0; i < 8; i++) {
            if (comandi[i][0].equals(comando)) {
                dainviare = comandi[i][val];
            }

        }
        try {
            outClient.writeBytes(dainviare + "\n");
        } catch (IOException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

    }

}
