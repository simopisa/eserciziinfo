package app;

import java.util.Scanner;

public class App {
    public static void main(String[] args) throws Exception {
    String nome="";
    String cognome="";
    String citta="";
    Scanner input=new Scanner(System.in);
    System.out.println("nome:");
    nome=input.nextLine();
    System.out.println("cognome:");
    cognome=input.nextLine();
    System.out.println("città:");
    citta=input.nextLine();
       Thread th1= new Thread(new Classe(nome,"thread1"));
       th1.start();
       Thread th2= new Thread(new Classe(cognome,"thread2"));
       th2.start();
       Thread th3= new Thread(new Classe(citta,"thread3"));
       th3.start();

    }
}