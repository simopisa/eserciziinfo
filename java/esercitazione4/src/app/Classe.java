package app;

public class Classe implements Runnable{
    private String stringa;
    private String nome;
    public Classe(String stringa, String nome){
        this.stringa=stringa;
        this.nome=nome;
    }
    @Override
    public void run(){
        System.out.println("nome thread: "+nome+"---"+stringa);
    }
    
}