class FiguraGeometrica():
    def __init__(self, ancho, altura):
        self.ancho = ancho
        self.altura = altura
        
    def Area(self):
        print("---Área de la figura---")
        
class Rectangulo(FiguraGeometrica):
    def Area(self):
        print("El área del rectángulo es: ", self.ancho*self.altura)
        
class Triangulo(FiguraGeometrica):
    def Area(self):
        print("El área del triángulo es: ", (self.ancho*self.altura)/2)
        
figura = FiguraGeometrica(2, 3)
rectangulo = Rectangulo(2, 3)
triangulo = Triangulo(2, 3)

figura.Area()
rectangulo.Area()
triangulo.Area()
        
        