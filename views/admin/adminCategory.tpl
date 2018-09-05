<h2>Категории</h2>
	<div id="blockNewCategory">
	Новая категория:
	<input type="text" name="newCategoryName" id="newCategoryName" value="">
	<br>

	Является подкатегорией для 
	<select name="generalCatId">
		<option value="0">Главная категория  
		{foreach $rsCategories as $item}
			<option value="{$item['id']}">{$item['name']}
		{/foreach}
	</select>
	<br>
	<input type="button" onclick="newCategory();" value="Добавить категорию">

	</div>
	<br>
	
	<table border="1" cellpadding="1" cellspacing="1">
		<tr>
			<th>№</th>
			<th>ID</th>
			<th>Название</th>
			<th>Родительская категория</th>
			<th>Действие</th>
		</tr>
		{foreach $rsCategories as $item name=categories}
			<tr>
				<td>{$smarty.foreach.categories.iteration}</td>
				<td>{$item['id']}</td>
				<td>
					<input type="edit" id="itemName_{$item['id']}" value="{$item['name']}">
				</td>
				<td>
					<select id="parentId_{$item['id']}">
						<option value="0">Главная категория
						{foreach $rsMainCategories as $mainItem}
							<option value="{$mainItem['id']}" {if $item['parent_id'] == $mainItem['id']}selected{/if}>{$mainItem['name']}
						{/foreach}
					</select>
				</td>
				<td>
					<input type="button" value="Сохранить" onclick="updateCat({$item['id']});">
				</td>
			</tr>
			{/foreach}
	</table>