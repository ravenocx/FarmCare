@extends('layouts.admin.app')

@section('title', 'Admin - Veterinarian Applicant')

@section('main-content')
    <div
        class="container mt-32 mx-auto relative overflow-x-auto overflow-y-auto max-h-[640px] shadow-md sm:rounded-lg mb-20">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500">
            <thead class="text-md text-white bg-shadeBrown sticky top-0">
                <tr class="text-center">
                    <th scope="col" class="p-4">
                        No.
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Specialist
                    </th>
                    <th scope="col" class="px-6 py-3">
                        University
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Graduate Year
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Certification
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Action
                    </th>
                </tr>
            </thead>
            {{-- <tbody class="bg-white divide-y divide-gray-200">
              <tr>
                <td class=" text-center mx-auto py-20" colspan="8">
                  <img class="w-32 h-32 mx-auto"
                    src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                    alt="image empty states">
                  <p class="text-gray-700 font-medium text-lg text-center">No request data available.</p>
                  <p class="text-gray-500 text-center">Please wait for upcoming request</p>
                  
                </td>
              </tr>
            </tbody>
            <tbody class="text-center">
                @for ($i = 0; $i < 30; $i++)
                <tr class="odd:bg-white even:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <td class="w-4 p-4">
                        {{$i+1}}
                    </td>
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        drh. Sofwan Abdul Fatah
                    </th>
                    <td class="px-6 py-4">
                        Livestock Specialist
                    </td>
                    <td class="px-6 py-4">
                        Telkom University
                    </td>
                    <td class="px-6 py-4">
                        2007
                    </td>
                    <td class="px-6 py-4">
                        sopwan@gmail.com
                    </td>
                    <td class="px-6 py-4">
                        <a href=""><u>Certification Link</u></a>
                    </td>
                    <td class="flex justify-center items-center px-6 py-4">
                        <a href="#" class="font-medium text-green-600 dark:text-blue-500 hover:underline">Approve</a>
                        <a href="#" class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Reject</a>
                    </td>
                </tr>
                @endfor
            </tbody> --}}
            <tbody class="bg-white divide-y divide-gray-200">
                @if ($veterinariansByAccepted->isEmpty())
                    <tr>
                        <td class=" text-center mx-auto py-20" colspan="8">
                            <img class="w-32 h-32 mx-auto"
                                src="https://res.cloudinary.com/daqsjyrgg/image/upload/v1690261234/di7tvpnzsesyo7vvsrq4.svg"
                                alt="image empty states">
                            <p class="text-gray-700 font-medium text-lg text-center">No request data available.</p>
                            <p class="text-gray-500 text-center">Please wait for upcoming request</p>
                        </td>
                    </tr>
                @else
                    @foreach ($veterinariansByAccepted as $index => $veterinarian)
                        <tr
                            class="odd:bg-white even:bg-gray-100 border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                {{ $index + 1 }}
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $veterinarian->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $veterinarian->specialist }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->university }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->graduate_year }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $veterinarian->email }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $veterinarian->certification_link }}"><u>Certification Link</u></a>
                            </td>
                            <td class="flex justify-center items-center px-6 py-4">
                                @if ($veterinarian->is_accepted === 0)
                                    <span class="text-red-600 dark:text-red-500">Rejected</span>
                                @elseif ($veterinarian->is_accepted === 1)
                                    <span class="text-green-600 dark:text-blue-500">Accepted</span>
                                @else
                                    <form
                                        action="{{ route('admin.management.applicant.update-status', ['id' => $veterinarian->id]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="accept">
                                        <button type="submit"
                                            class="font-medium text-green-600 dark:text-blue-500 hover:underline">Approve</button>
                                    </form>
                                    <form
                                        action="{{ route('admin.management.applicant.update-status', ['id' => $veterinarian->id]) }}"
                                        method="POST" class="inline">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="reject">
                                        <button type="submit"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Reject</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
@endsection
