@if($message->isMessage())
    @include('projects.messages.message-value-input', [
        'language' => $language,
        'message' => $message,
        'values' => $values,
        'form' => null,
    ])
@elseif($message->isPlural())
    @foreach($language->plural_forms as $form)
        @include('projects.messages.message-value-input', [
            'language' => $language,
            'message' => $message,
            'values' => $values,
            'form' => $form,
        ])
    @endforeach
@elseif($message->isGender())
    @foreach($language->getGenderForms() as $gender)
        @include('projects.messages.message-value-input', [
            'language' => $language,
            'message' => $message,
            'values' => $values,
            'form' => $gender,
        ])
    @endforeach
@endif
