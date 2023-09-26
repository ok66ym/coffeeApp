<section class="space-y-10">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('アカウント削除') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('アカウントを削除すると復元できません．登録済みのプロフィールや投稿データなど，全ての情報が削除されます．利用を再開するには，新規登録が必要です．') }}
        </p>
    </header>

    @if($user->email !== 'guest@guest.com')
        <x-danger-button
            x-data=""
            x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        >{{ __('削除') }}</x-danger-button>

        <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
                @csrf
                @method('delete')

                <h2 class="text-lg font-medium text-gray-900">
                    {{ __('Are you sure you want to delete your account?') }}
                </h2>

                <p class="mt-1 text-sm text-gray-600">
                    {{ __('アカウントが削除すると復元できません．登録済みの全ての情報が削除されます．アカンウトを完全に削除することを確認するためにパスワードを入力してください．') }}
                </p>

                <div class="mt-6">
                    <x-input-label for="password" value="{{ __('パスワード') }}" class="sr-only" />

                    <x-text-input
                        id="password"
                        name="password"
                        type="password"
                        class="mt-1 block w-3/4"
                        placeholder="{{ __('パスワード') }}"
                    />

                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('キャンセル') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('削除') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    @else
        <p class="mt-2 text-red-600">{{ __('ゲストユーザーはアカウントを削除できません。') }}</p>
    @endif
</section>
