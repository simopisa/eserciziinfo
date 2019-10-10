package app;

/**
 * Semaforo
 */
public class Semaforo {
    private int valore;
    public Semaforo(int valore) {
        this.valore=valore;
    }
    synchronized public void P() {
        while (valore==0) {//se il semaforo è rosso
            try {
                wait();
            } catch (Exception e) {
                System.err.println(e.getMessage());
            }
        }
        valore--;//Semaforo a rosso
    }
    synchronized public void V() {
        valore++;
        notify();
    }
}