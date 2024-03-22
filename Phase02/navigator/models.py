from django.db import models


class Job(models.Model):
    position = models.CharField(max_length=200)
    company = models.CharField(max_length=200)
    location = models.CharField(max_length=200)
    description = models.TextField()
    skills = models.JSONField()
    link = models.URLField()

    def __str__(self):
        return f"{self.position} @ {self.company}"
