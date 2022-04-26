<div>
    <x-guest-layout>
        <div class="container mx-auto mt-4">
            <h1 class="font-bold text-2xl mt-2 ml-3">My Tasks</h1>
        </div>
        <div class="container max-w-2xl my-8 text-base font-sans mx-auto">
            @if($todos->count() > 0)
            <h2 class="font-light text-gray-400 uppercase text-xl mb-4">To-do</h2>
            <div class="flex flex-col w-full border border-gray-300 shadow-lg overflow-hidden mx-auto mb-8">
                @foreach ($todos as $todo)
                <label class="custom-label border-b border-gray-300">
                    <div class="flex mx-3 my-4">
                        <div class="bg-white shadow w-6 h-6 flex justify-center items-center mr-4" wire:click="toggleStatus({{ $todo->id }})">
                            <svg class="hidden w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                                    <path d="M0 172V0h172v172z" />
                                    <path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1" />
                                </g>
                            </svg>
                        </div>
                        <span class="select-none"> {{ $todo->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" wire:click="delete({{ $todo->id }})" class="ml-auto h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>
                @endforeach
            </div>
            @endif

            @if($finished->count() > 0)
            <h2 class="font-light text-gray-400 uppercase text-xl mb-4">Completed</h2>
            <div class="flex flex-col w-full border border-gray-300 shadow-lg overflow-hidden mx-auto mb-8">
                @foreach ($finished as $todo)
                <label class="custom-label border-b border-gray-300">
                    <div class="flex mx-3 my-4">
                        <div class="bg-white shadow w-6 h-6 flex justify-center items-center mr-4" wire:click="toggleStatus({{ $todo->id }})">
                            <svg class="w-4 h-4 text-green-600 pointer-events-none" viewBox="0 0 172 172">
                                <g fill="none" stroke-width="none" stroke-miterlimit="10" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode:normal">
                                    <path d="M0 172V0h172v172z" />
                                    <path d="M145.433 37.933L64.5 118.8658 33.7337 88.0996l-10.134 10.1341L64.5 139.1341l91.067-91.067z" fill="currentColor" stroke-width="1" />
                                </g>
                            </svg>
                        </div>
                        <span class="select-none line-through italic text-gray-500"> {{ $todo->name }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" wire:click="delete({{ $todo->id }})" class="ml-auto h-6 w-6 text-gray-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </label>
                @endforeach
            </div>
            @endif

            @if($todos->count() === 0)
            There's nothing to do! Want to add a task?
            @endif

            <div class="flex mx-auto mt-4">
                <input class="w-8/12 rounded-l-lg p-4 border-t mr-0 border-b border-l text-gray-800 border-gray-300 bg-white" wire:keydown.enter="create" wire:model="name" placeholder="I need to do...">
                <button type="submit" wire:click="create" class="w-4/12 px-8 rounded-r-lg bg-slate-400 text-gray-800 font-bold p-4 uppercase border-gray-300 border-t border-b border-r">Add Item</button>
            </div>
        </div>


    </x-guest-layout>

</div>
