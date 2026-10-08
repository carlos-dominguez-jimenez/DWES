from django.shortcuts import render
from .models import Animal, Colaborador, Protectora

# Create your views here.
def lista_animales(request):
    animales = Animal.objects.all()
    return render(request, 'blog/lista_animales.html', {'animales': animales})

def lista_colaboradores(request):
    colaboradores = Colaborador.objects.all()
    return render(request, 'blog/lista_colaboradores.html', {'colaboradores': colaboradores})

def lista_protectoras(request):
    protectoras = Protectora.objects.all()
    return render(request, 'blog/lista_protectoras.html', {'protectoras': protectoras})