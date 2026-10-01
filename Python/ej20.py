class Empleado():
    def __init__(self, nombre, salario):
        self.nombre = nombre
        self.salario = salario

    def calcular_salario_anual(self):
        print("Su salario anual es de: ", self.salario * 12)

class Gerente(Empleado):
    def __init__(self, nombre, salario, plus):
        super().__init__(nombre, salario)
        self.plus = plus

    def calcular_salario_anual(self):
        print("Tienes un plus de: ", self.plus)
        return super().calcular_salario_anual()
        
class Programador(Empleado):
    def __init__(self, nombre, salario, id):
        super().__init__(nombre, salario)
        self.id = id

    def calcular_salario_anual(self):
        print("Tu id es: ", self.id)
        return super().calcular_salario_anual()

empleado = Empleado("Raul", 1500)
gerente = Gerente("Pepa", 1800, 150)
prog = Programador("Carlos", 1250, 13)

empleado.calcular_salario_anual()
gerente.calcular_salario_anual()
prog.calcular_salario_anual()