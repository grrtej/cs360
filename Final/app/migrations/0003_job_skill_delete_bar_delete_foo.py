# Generated by Django 5.0.4 on 2024-04-24 12:31

from django.db import migrations, models


class Migration(migrations.Migration):

    dependencies = [
        ('app', '0002_remove_bar_foo_bar_foo'),
    ]

    operations = [
        migrations.CreateModel(
            name='Job',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('position', models.CharField(max_length=100)),
                ('company', models.CharField(max_length=100)),
                ('city', models.CharField(max_length=100)),
                ('state', models.CharField(max_length=100)),
                ('is_remote', models.BooleanField()),
                ('description', models.TextField()),
                ('link', models.URLField()),
            ],
        ),
        migrations.CreateModel(
            name='Skill',
            fields=[
                ('id', models.BigAutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('name', models.CharField(max_length=100)),
                ('related_jobs', models.ManyToManyField(to='app.job')),
            ],
        ),
        migrations.DeleteModel(
            name='Bar',
        ),
        migrations.DeleteModel(
            name='Foo',
        ),
    ]
