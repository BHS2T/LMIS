import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class TestAddDepartment {
    public void addDepartment(){
        TestLogin login = new TestLogin();
        WebDriver driver = login.driver;
        System.setProperty("webdriver.chrome.driver","chromedriver.exe");
        driver.get("http://localhost/LIMS_V3.1/View/index.php");
        WebElement username = driver.findElement(By.id("username"));
        WebElement password = driver.findElement(By.id("password"));
        WebElement loginBtn = driver.findElement(By.id("loginBtn"));
        //mola is an it head
        username.sendKeys("Mola");
        password.sendKeys("pass");
        loginBtn.click();

        driver.get("http://localhost/LIMS_V3.1/View/adddepartment.php");

        WebElement nameofdept =    driver.findElement(By.id("department"));
        WebElement addDeptBtn =   driver.findElement(By.id("addDept"));

        nameofdept.sendKeys("DepartmentName");
        addDeptBtn.click();
        //confirmation

        WebElement confirmAddBtn =   driver.findElement(By.id("confirmAdditionD"));
        confirmAddBtn.click();
        //success notifier dialogue
        try{
            WebElement success =driver.findElement(By.id("successfulInsertion"));
            System.out.println("TEST ADD DEPARTMENT PASSED");
        }
        catch (Exception ex){
            System.out.println("TEST ADD DEPARTMENT FAILED");

        }
        driver.close();
    }
}
