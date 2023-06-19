<?php

namespace App\MoonShine\Resources;

use App\Models\User;
use MoonShine\Fields\ID;

use MoonShine\Fields\Text;
use MoonShine\Fields\Image;
use MoonShine\Fields\Password;
use MoonShine\Resources\Resource;
use MoonShine\Actions\FiltersAction;
use MoonShine\Fields\PasswordRepeat;
use Illuminate\Database\Eloquent\Model;

class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Users';

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Nama', 'name'),
            Text::make('NIP', 'nip'),
            Text::make('Email', 'email'),
            Password::make('Password', 'password')->hideOnIndex(),
            PasswordRepeat::make('Repeat password', 'password_repeat')->hideOnIndex(),
            Image::make('Avatar', 'avatar')
            ->dir('/avatar') // The directory where the files will be stored in storage (by default /)
            ->disk('public') // Filesystems disk
            ->allowedExtensions(['jpg', 'gif', 'png']) // Allowable extensions
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
