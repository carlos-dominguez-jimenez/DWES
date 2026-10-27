from django.shortcuts import render
from django.core.exceptions import BadRequest, PermissionDenied
from .models import Usuario, Proyecto, Tarea, AsignacionTarea, Etiqueta, Comentario

def index(request):
    return render(request, 'blog/index.html')

def listar_proyectos(request):
    proyectos = Proyecto.objects.select_related("creador").prefetch_related("proyectos_asignados")
    proyectos = proyectos.all()
    return render(request, 'blog/lista.html', {"proyectos_mostrar": proyectos})

def dame_tareas_proyecto(request, id_proyecto):
    tareas = Tarea.objects.select_related("proyecto", "creador")
    tareas = tareas.filter(proyecto=id_proyecto).order_by("-fecha_creacion")
    return render(request, 'tarea/lista.html', {"tareas_mostrar": tareas})

def dame_usuarios_tarea(request, id_tarea):
    usuarios = AsignacionTarea.objects.select_related("usuario", "tarea").filter(tarea_id=id_tarea).order_by("fecha_asignacion")
    return render(request, 'usuario/lista.html', {"usuarios_mostrar": usuarios})