<form action="{{ route('locale.change') }}" method="POST">
    @csrf
    <input type="hidden" name="slug" value="{{ request()->path() }}">
    <select name="locale" onchange="this.form.submit()">
        <option value="en" {{ app()->getLocale() == 'en' ? 'selected' : '' }}>English</option>
        <option value="it" {{ app()->getLocale() == 'it' ? 'selected' : '' }}>Italian</option>
        <!-- Aggiungi altre lingue se necessario -->
    </select>
</form>
