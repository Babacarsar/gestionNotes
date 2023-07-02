<?php

namespace App\Repositories;

use App\Models\Subject; // Remplacez "App\Models\Subject" par le chemin réel vers votre modèle Subject

class SubjectRepo
{
    public function getAllSubjects()
    {
        return Subject::all();
    }

    public function createSubject($data)
    {
        return Subject::create($data);
    }

    public function updateSubject($id, $data)
    {
        $subject = Subject::findOrFail($id);
        $subject->update($data);
        return $subject;
    }

    public function deleteSubject($id)
    {
        $subject = Subject::findOrFail($id);
        $subject->delete();
    }
}
