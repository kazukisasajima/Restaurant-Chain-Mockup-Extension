<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Generate Users</title>
    </head>
    <body>
        <form action="download.php" method="post">
            <label for="count">Number of Employees:</label>
            <input type="number" id="count" name="count" min="1" max="100" value="5">

            <label for="salary_min">Minimum Salary:</label>
            <input type="number" id="salary_min" name="salary_min" min="0" value="30000">

            <label for="salary_max">Maximum Salary:</label>
            <input type="number" id="salary_max" name="salary_max" min="0" value="80000">

            <label for="locations">Number of Locations:</label>
            <input type="number" id="locations" name="locations" min="1" max="10" value="3">

            <label for="zipcode_min">Zip Code Minimum:</label>
            <input type="text" id="zipcode_min" name="zipcode_min" value="10000">

            <label for="zipcode_max">Zip Code Maximum:</label>
            <input type="text" id="zipcode_max" name="zipcode_max" value="99999">

            <label for="format">Download Format:</label>
            <select id="format" name="format">
                <option value="html">HTML</option>
                <option value="markdown">Markdown</option>
                <option value="json">JSON</option>
                <option value="txt">Text</option>
            </select>

            <button type="submit">Generate</button>
        </form>
    </body>
</html>
