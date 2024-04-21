<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student|null $student
 * @method static \Database\Factories\EducationFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Education newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Education query()
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Education whereUpdatedAt($value)
 */
	class Education extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int $student_id
 * @property int|null $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\Topic|null $topic
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\LessonWord> $words
 * @property-read int|null $words_count
 * @method static \Database\Factories\LessonFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson query()
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Lesson whereUpdatedAt($value)
 */
	class Lesson extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $word
 * @property int $lesson_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Lesson $lesson
 * @method static \Database\Factories\LessonWordFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord query()
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord whereLessonId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|LessonWord whereWord($value)
 */
	class LessonWord extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property string|null $annotation
 * @property int $student_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student $student
 * @property-read \App\Models\User|null $teacher
 * @method static \Illuminate\Database\Eloquent\Builder|Note newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Note query()
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereAnnotation($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereStudentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Note whereUserId($value)
 */
	class Note extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Student|null $student
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\SkillFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill query()
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Skill whereUpdatedAt($value)
 */
	class Skill extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property int $registration
 * @property string|null $about
 * @property int $user_id
 * @property int $skill_id
 * @property int $education_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Education|null $education
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Note> $notes
 * @property-read int|null $notes_count
 * @property-read \App\Models\Skill|null $skill
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\StudentFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Student newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Student query()
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAbout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereEducationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereRegistration($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Student whereUserId($value)
 */
	class Student extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $title
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Lesson> $lessons
 * @property-read int|null $lessons_count
 * @property-read \App\Models\User $user
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TopicWord> $words
 * @property-read int|null $words_count
 * @method static \Database\Factories\TopicFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Topic whereUserId($value)
 */
	class Topic extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $word
 * @property int $topic_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Topic $topic
 * @method static \Database\Factories\TopicWordFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord query()
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord whereTopicId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TopicWord whereWord($value)
 */
	class TopicWord extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property int $skill_id
 * @property int $userType_id
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Note> $notes
 * @property-read int|null $notes_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Skill|null $skill
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Student> $students
 * @property-read int|null $students_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Topic> $topics
 * @property-read int|null $topics_count
 * @property-read \App\Models\UserType|null $userType
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSkillId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserTypeId($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * 
 *
 * @property int $id
 * @property string $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\UserTypeFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserType whereUpdatedAt($value)
 */
	class UserType extends \Eloquent {}
}

