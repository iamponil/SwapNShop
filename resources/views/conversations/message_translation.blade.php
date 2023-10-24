<!-- message-translation.blade.php -->
<div>
    <span onmouseover="translateMessage('{{ $message }}', 'en', 'ar')">{{ $message }}</span>
    <div id="translation-tooltip" style="display: none;">
        Translation: <span id="translated-message">Translating...</span>
    </div>
</div>
