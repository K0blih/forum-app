<?php

namespace App\Http\Resources;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Post
 */
class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => $this->whenLoaded('user', fn () => UserResource::make($this->user)),
            'title' => $this->title,
            'body' => $this->body,
            'updated_at' => $this->updated_at,
            'created_at' => Carbon::parse($this->created_at)->diffForHumans(),
        ];
    }
}
