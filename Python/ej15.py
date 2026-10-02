class coche():
    
    def __init__(self, marca, modelo):
        self.marca=marca
        self.modelo=modelo
    
    def información(self):
        print("---COCHE---")
        print("Marca: ", self.marca)
        print("Modelo: ", self.modelo)

coche1 = coche("Audi", "Q3")
coche1.información()