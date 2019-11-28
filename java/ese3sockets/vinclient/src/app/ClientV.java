package app;

import java.io.BufferedReader;

import java.io.DataOutputStream;
import java.io.InputStreamReader;
import java.net.Socket;
import java.util.Scanner;

public class ClientV {

    private Socket miosocket; // per mettersi in ascolto
    private String stringdalserver;
    private DataOutputStream outversoserver; // scrivere sullo stream
    private BufferedReader indalserver; // stream input
    private String nomeserver;
    private int porta;// porta di ascolto
    private BufferedReader tastiera; // prendere da tastiera

    public ClientV(String nomeserver, int porta) {
        this.nomeserver = nomeserver;
        this.porta = porta;
        tastiera = new BufferedReader(new InputStreamReader(System.in));

    }

    public void connetti() {
        try {

            miosocket = new Socket(nomeserver, porta);
            outversoserver = new DataOutputStream(miosocket.getOutputStream());
        } catch (Exception e) {
            // TODO: handle exception
        }

    }

}