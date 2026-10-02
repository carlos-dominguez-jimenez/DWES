class Rectangulo():
    
    def __init__(self,ancho,altura):
        self.ancho=ancho
        self.altura=altura
    
    def calcularArea(self):
        return "El área es: ", self.ancho * self.altura
    
    def calcularPerimetro(self):
        return "El perímetro es: ", 2 * (self.altura + self.ancho)
    
rectangulo1 = Rectangulo(2, 3)
    
print(rectangulo1.calcularArea())
print(rectangulo1.calcularPerimetro())
    