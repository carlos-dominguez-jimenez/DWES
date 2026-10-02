class Animal():
    
    def __init__(self):
        pass
    
    def hablar(self):
        print("El animal hace un sonido")
    
class Perro(Animal):
    def __init__(self):
        super().__init__()
    
    def hablar(self):
        print("GUAU")

class Gato(Animal):
    def __init__(self):
        super().__init__()
        
    def hablar(self):
        print("MIAU")
        
animal = Animal()
perro = Perro()
gato = Gato()

animal.hablar()
perro.hablar()
gato.hablar()