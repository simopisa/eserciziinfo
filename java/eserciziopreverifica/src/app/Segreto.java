package app;

/**
 * Segreto
 */
public class Segreto implements Runnable {
    //=======================================================
    int nome;
    public Segreto( int nome){
        this.nome=nome;
    }
    //=======================================================
    public void run(){
        //=======================================================
        Boolean controllo=true;
        //=======================================================
        while(controllo){
            App.semafori[nome].P();
            if(App.alt){
                System.out.println("sono l'amico "+nome+"ed il mio segreto è...");
            }else{
                controllo=false;
            }
            App.s1.V(); 
        }
        //=======================================================
    }
}