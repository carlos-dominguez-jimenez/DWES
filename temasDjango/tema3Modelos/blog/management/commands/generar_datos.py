import random
from datetime import timedelta
from django.core.management.base import BaseCommand
from faker import Faker
from blog.models import (Usuario, Proyecto, Tarea, Etiqueta,
                         AsignacionTarea, Comentario)

class Command(BaseCommand):
    help = "Crea 30 registros en cada tabla"

    def handle(self, *args, **options):
        fake = Faker("es_ES")
        N = 30

        usuarios = [Usuario.objects.create(
            nombre=fake.name(),
            correo_electronico=fake.unique.email(),
            contrasena=fake.password(),
        ) for _ in range(N)]

        proyectos = []
        for _ in range(N):
            inicio = fake.date_between("-1y", "today")
            p = Proyecto.objects.create(
                nombre=fake.catch_phrase()[:100],
                descripcion=fake.text(),
                duracion_estimada=round(random.uniform(1, 100), 1),
                fecha_inicio=inicio,
                fecha_finalizacion=inicio + timedelta(days=random.randint(10, 200)),
                creador=random.choice(usuarios),
            )
            p.proyectos_asignados.set(random.sample(usuarios, 3))
            proyectos.append(p)

        tareas = []
        for _ in range(N):
            estado = random.choice(["Pendiente", "Progreso", "Completada"])
            tareas.append(Tarea.objects.create(
                titulo=fake.sentence(nb_words=4)[:200],
                descripcion=fake.text(),
                prioridad=random.randint(1, 5),
                estado=estado,
                completada=(estado == "Completada"),
                hora_vencimiento=fake.time_object(),
                creador=random.choice(usuarios),
                proyecto=random.choice(proyectos),
            ))

        for _ in range(N):
            AsignacionTarea.objects.create(
                usuario=random.choice(usuarios),
                tarea=random.choice(tareas),
                observaciones=fake.sentence(),
            )

        for _ in range(N):
            e = Etiqueta.objects.create(nombre=fake.unique.word())
            e.etiquetas_asociadas.set(random.sample(tareas, 3))

        for u, t in zip(usuarios, tareas):
            Comentario.objects.create(
                contenido=fake.paragraph(), autor=u, comentario=t
            )

        self.stdout.write(self.style.SUCCESS("30 registros creados en cada tabla"))