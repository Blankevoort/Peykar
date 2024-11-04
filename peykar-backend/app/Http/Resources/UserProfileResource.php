<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserProfileResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'phone' => $this->phone,
            'email' => $this->email,
            'jobTitle' => $this->jobTitle,
            'linkedIn' => $this->linkedIn,
            'profile' => [
                'birth' => $this->profile->birth ?? null,
                'resume' => $this->profile->resume ?? null,
                'description' => $this->profile->description ?? null,
                'gender' => $this->profile->gender ?? null,
                'maritalStatus' => $this->profile->maritalStatus ?? null,
                'militaryServiceStatus' => $this->profile->militaryServiceStatus ?? null,
                'city' => $this->profile->city ?? null,
                'region' => $this->profile->region ?? null,
                'expectedSalary' => $this->profile->expectedSalary ?? null,
                'preferredJob' => $this->profile->preferredJob ?? null,
                'foreigners' => $this->profile->foreigners ?? null,
                'disability' => $this->profile->disability ?? null,
                'nationality' => $this->profile->nationality ?? null,
                'disabilityType' => $this->profile->disabilityType ?? null,

                'education' => $this->profile->education ?? null,
                'languages' => $this->profile->langs ?? null,
                'workExperience' => $this->profile->workExperience ?? null,
                'softwareSkills' => $this->profile->softwareskills ?? null,
                'additionalSkills' => $this->profile->skills ?? null,

                'additionalInformation' => [
                    'formerColleagues' => $this->when(
                        $this->profile && $this->profile->partners,
                        $this->profile->partners
                    ),
                    'educationCourses' => $this->when(
                        $this->profile && $this->profile->courses,
                        $this->profile->courses
                    ),
                    'awards' => $this->when(
                        $this->profile && $this->profile->awards,
                        $this->profile->awards
                    ),
                    'academicExperiences' => $this->when(
                        $this->profile && $this->profile->academicEXPS,
                        $this->profile->academicEXPS
                    ),
                    'publications' => $this->when(
                        $this->profile && $this->profile->books,
                        $this->profile->books
                    ),
                    'volunteerActivities' => $this->when(
                        $this->profile && $this->profile->activities,
                        $this->profile->activities
                    ),
                ],
            ],
        ];
    }
}
