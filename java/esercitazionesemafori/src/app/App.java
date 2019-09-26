package app;

public class App {
    protected static Semaforo pieno,vuoto;
    protected static int risorsa;
    public static void main(String[] args) throws Exception {
        pieno = new Semaforo(0);//inizializzo semaforo rosso
        vuoto = new Semaforo(1);//inizializzo semaforo verde
        int n=5;
        Thread prod=new Thread(new Produttore("produttore",n));
        Thread cons=new Thread(new Consumatore("consumatore", n));
        prod.start();
        cons.start();

    }
}