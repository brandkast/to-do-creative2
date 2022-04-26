<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todos;

class ShowTodos extends Component
{
    public function mount(Todos $todo)
    {
        $this->name = $todo->name;
        $this->completed = $todo->completed;
    }

    public function render()
    {
        return view('livewire.todo', [
            'todos' => Todos::where('completed', 0)->get(),
            'finished' => Todos::where('completed', 1)->get()
        ]);
    }

    public function create()
    {
        Todos::create([
            'name' => $this->name,
            'completed' => 0
        ]);

        $this->name = null;
    }

    public function delete(Todos $todo)
    {
        $todo->delete();
    }

    public function toggleStatus(Todos $todo)
    {
        $status = $todo->completed === 1 ? 0 : 1;
        $todo->completed = $status;
        $todo->save();
    }
}
