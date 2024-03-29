# Generated by Django 5.0.3 on 2024-03-25 21:07

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = []

    operations = [
        migrations.CreateModel(
            name="Job",
            fields=[
                (
                    "id",
                    models.BigAutoField(
                        auto_created=True,
                        primary_key=True,
                        serialize=False,
                        verbose_name="ID",
                    ),
                ),
                ("position", models.CharField(max_length=200)),
                ("company", models.CharField(max_length=200)),
                ("location", models.CharField(max_length=200)),
                ("description", models.TextField()),
                ("skills", models.JSONField()),
                ("link", models.URLField()),
            ],
        ),
    ]
