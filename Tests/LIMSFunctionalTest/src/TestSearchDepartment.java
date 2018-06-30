import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.By;

public class TestSearchDepartment {
    public void search(){
        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        username.sendKeys("f");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/viewDepartment.php");

        WebElement searchField =    driver.findElement(By.id("dept"));
        WebElement searchBtn =   driver.findElement(By.id("searchBtn"));
        //we have entered new department
        searchField.sendKeys("NewDepartment");
        searchBtn.click();
        try{
            WebElement success =driver.findElement(By.id("searchTitle"));
            System.out.println("TEST SEARCH Department PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST SEARCH Department FAILED");

        }
        driver.close();
    }

}

