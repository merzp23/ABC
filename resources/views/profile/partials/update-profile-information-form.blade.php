<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class =" row">
            <div class =" col ">
            <x-input-label for="name" :value="__('Họ và Tên')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" value="{{$user->name}}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
            </div>
            <div class =" col">
            <x-input-label for="NgaySinh" :value="__('Ngày sinh')" />
            <x-text-input id="NgaySinh" name="NgaySinh" type="date" class="mt-1 block w-full" value="{{$user->NgaySinh}}" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('NgaySinh')" />
            </div>
            <div class ="col">
            <x-input-label for="GioiTinh" value="Giới tính"/>
            <select id="GioiTinh" name="GioiTinh" type="text" class="mt-1 w-full"  required>
                <option @selected($user->GioiTinh=="Nam"||$user->GioiTinh==null)>Nam</option>
                <option @selected($user->GioiTinh=="Nu")>Nữ</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('GioiTinh')" />
            </div>
        </div>
        <div class =" row">
            <div class ="col">
                <x-input-label for="CCCD" :value="__('CCCD')" />
                <x-text-input id="CCCD" name="CCCD" type="number" class="mt-1 block w-full" value="{{$user->CCCD}}" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('CCCD')" />
            </div>
        </div>
        <div class =" row">
            <div class ="col">
                <x-input-label for="QueQuan" :value="__('Quê quán')" />
                <x-text-input id="QueQuan" name="QueQuan" type="text" class="mt-1 block w-full" value="{{$user->QueQuan}}" required autocomplete="username" />
                <x-input-error class="mt-2" :messages="$errors->get('QueQuan')" />
            </div>
        </div>
        <div class =" row">
            <div class =" col ">
                <x-input-label for="ChucVu" value="Phòng ban" />
                <select id="ChucVu" name="PhongBan" type="text" class="mt-1 block w-full"  required>
                    <option @selected($user->PhongBan=="Phòng Sản xuất"||$user->PhongBan==null)>Phòng Sản xuất </option>
                    <option @selected("Phòng Công nghệ thông tin"== $user->PhongBan)>Phòng Công nghệ thông tin</option>
                    <option @selected("Phòng Kinh doanh"== $user->PhongBan)>Phòng Kinh doanh</option>
                    <option @selected("Phòng Nhân sự"== $user->PhongBan)>Phòng Nhân sự</option>
                    <option @selected("Phòng Kế toán"== $user->PhongBan)>Phòng Kế toán</option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('PhongBan')" />
            </div>
            <div class =" col ">
                <x-input-label for="ChucVu" value="Chức vụ" />
                <select id="ChucVu" name="ChucVu" type="text" class="mt-1 block w-full"  required>
                    <option @selected($user->ChucVu=="Thực tập sinh"||$user->ChucVu==null)>Thực tập sinh</option>
                    <option @selected($user->ChucVu=="Nhân viên")>Nhân viên</option>
                    <option @selected($user->ChucVu=="Chuyên viên")>Chuyên viên </option>
                </select>
                <x-input-error class="mt-2" :messages="$errors->get('ChucVu')" />
            </div>

        </div>
        <div class =" row">
            <div class =" col">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" value="{{$user->email}}" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
            </div>
            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <button type="submit"  class = "button-blue btn btn-primary">{{ __('Save') }}</button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
