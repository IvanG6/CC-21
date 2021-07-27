<?php

namespace Database\Seeders\Chat;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Models\Coach;
use App\Models\User;
use Illuminate\Database\Seeder;

class ChatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var Coach $coach */
        $coach = Coach::query()->first();
        /** @var User $client */
        $client = User::query()->first();

        /** @var Chat $chat */
        $chat = Chat::query()->firstOrCreate(['coach_id' => $coach->id, 'client_id' => $client->id]);

        // client send message to coach
        $chat->messages()->create([
            'model_from_id' => $client->id,
            'model_from_type' => $client->getMorphClass(),
            'model_to_id' => $coach->id,
            'model_to_type' => $coach->getMorphClass(),
            'message' => 'Hello, man i was bought package, please send me some materials',
        ]);

        // coach send message to client and attach file
        /** @var ChatMessage $message */
        $message = $chat->messages()->create([
            'model_from_id' => $coach->id,
            'model_from_type' => $coach->getMorphClass(),
            'model_to_id' => $client->id,
            'model_to_type' => $client->getMorphClass(),
            'message' => 'Hello, yep of course',
        ]);


        $message->files()->create([
            'chat_id' => $chat->id,
            'message_id' => $message->id,
            'model_from_id' => $coach->id,
            'model_from_type' => $coach->getMorphClass(),
            'name' => 'English words',
            'path' => 'eng_w.pdf',
            'extension' => 'pdf'
        ]);
    }
}
