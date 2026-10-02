num1 = int(input("Introduce el primer número: "))
num2 = int(input("Introduce el segundo número: "))

while num2 != 0:
    mcd = num2
    num2 = num1 % num2
    num1 = mcd

print("El máximo común divisor es: ", num1)