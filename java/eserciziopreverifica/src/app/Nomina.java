package app;

import java.util.Random;

/**
 * Nomina
 */
public class Nomina implements Runnable{
    //=======================================================
    public Nomina(){
     
    }
    //=======================================================
    public void run(){
        Random ran=new Random(); 
        //=======================================================
        while (App.cont<20) {
            App.s1.P();
            int random=ran.nextInt(3);
            System.out.println("generato numero "+random);
            App.cont++;
            App.semafori[random].V();
            
        }   
        //=======================================================
        App.alt=false;
        for(int i=0;i<3;i++){
            App.semafori[i].V();
        }
        //=======================================================
      
    }
    
}