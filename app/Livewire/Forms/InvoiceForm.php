<?php

namespace App\Livewire\Forms;

use App\Models\Invoice;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Auth;

class InvoiceForm extends Form
{
    // Forms\Components\FileUpload::make('cv')->downloadable()->label('ملف السيرة الذاتية'),
    use WithFileUploads;
    #[Validate('nullable|string')]
    public string $title = '';
    #[Validate('required|string')]
    public string $buyer_name = '';
    #[Validate('required|string')]
    public string $buyer_mobile = '';
    #[Validate('required|string')]
    public string $buyer_address = '';
    #[Validate('required|string')]
    public string $buyer_email = '';
    #[Validate(['url_invoice' =>'nullable|mimes:pdf|max:3024'])]
    public  $url_invoice ;
    #[Validate('nullable|string')]
    public string $amount = '0';
    #[Validate('required|int')]
    public string $original_amount = '0';
    #[Validate('nullable|int')]
    public string $accumulated_amount = '0';
    public string $status = '';
    public ?int $userId;
    #[Validate(['file_invoice.*' => 'nullable|image|max:2024'])]
    public  $file_invoice=[];
   
    public ?Invoice $invoice;
    public function setUser(?User $user)
    {
        if ($user) $this->userId = $user->id;
    }
    public function setStory(Invoice $invoice)
    {
        $this->title = $invoice->title;
    }
    public function store(): void
    {
        $validated =   $this->validate();
        $invoice = new Invoice();
        $invoice->fill($validated);
        if ($this->url_invoice) {
            $invoice->url_invoice=  $this->url_invoice->store('invoices');
        }
        if ($this->file_invoice && count($this->file_invoice)>0) {
            $files=[];
            foreach ($this->file_invoice as $photo) {
               $files[]= $photo->store('invoices');
            }
            $invoice->file_invoice = count($files)>0?$files:null;
        }
     
        $invoice->user_id = $this->userId;
        $invoice->status =null;
        $invoice->save();
        $this->invoice = $invoice;
    }
}
