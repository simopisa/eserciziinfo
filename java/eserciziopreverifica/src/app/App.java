package app;



public class App {
    protected static int cont=0;
    protected static Semaforo s1=new Semaforo(1);
    protected static Semaforo[] semafori=new Semaforo[3];
    protected static Boolean alt=true;
    public static void main(String[] args) throws Exception {
        //=======================================================
        Thread nom=new Thread(new Nomina());
        //=======================================================
        for (int i = 0; i < semafori.length; i++) {
            semafori[i]=new Semaforo(0);
        }
        //=======================================================
        Thread[] amici=new Thread[3];
        //=======================================================
        for (int i = 0; i < amici.length; i++) {
            amici[i]=new Thread(new Segreto(i));
        }
        //=======================================================
        nom.start();
        amici[0].start();
        amici[1].start();
        amici[2].start();
        //=======================================================

    }
}