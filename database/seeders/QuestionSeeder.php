<?php

namespace Database\Seeders;

use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $questions = [
            '¿Las actividades propuestas le facilitaron el aprendizaje?',
            '¿Las actividades y la dinámica de la asignatura se adecuaron a sus necesidades y estilo particular de aprender?',
            '¿Tuvo indicaciones claras y precisas para comprender los temas y desarrollar las actividades?',
            '¿Los conocimientos logrados y las habilidades desarrolladas a través de la asignatura le permiten mejorar su desempeño?',
            '¿El tiempo previsto para el estudio de los distintos temas fue adecuado?',
            '¿El curso lo satisface a nivel general?',
            '¿Propone la pregunta orientadora como herramientas para el aprendizaje?',
            '¿Reconoce avances del estudiante en la consecución de las competencias establecidas para la asignatura?',
            '¿Cumple con el horario establecido para clases y actividades para el desarrollo del curso?'
        ];

        foreach ($questions as $question) {
            Question::create(['body' => $question]);
        }
    }
}
